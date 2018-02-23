<?php
/**
 * PHP library for adding addition of complements for Eliasis Framework.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - Eliasis Complement
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Eliasis-Framework/Complement
 * @since     1.0.9
 */
namespace Eliasis\Complement\Traits;

use Eliasis\Framework\App;
use Josantonius\File\File;
use Josantonius\Json\Json;
use Josantonius\Url\Url;

/**
 * Complement import class.
 */
trait ComplementImport
{
    /**
     * Check for new complement version.
     *
     * @return bool
     */
    public function hasNewVersion()
    {
        return $this->complement['version'] < $this->getRepositoryVersion();
    }

    /**
     * Get repository version.
     *
     * @uses \Eliasis\Complement\Complement->$complement
     * @uses \Josantonius\Json\Json::fileToArray
     *
     * @return string → repository version
     */
    public function getRepositoryVersion()
    {
        $version = $this->complement['version'];

        if (! isset($this->complement['config-url'])) {
            return $version;
        }

        if (! File::exists($this->complement['config-url'])) {
            return $version;
        }

        $config = Json::fileToArray($this->complement['config-url']);
        $version = isset($config['version']) ? $config['version'] : $version;

        return $version;
    }

    /**
     * Complement installation handler.
     *
     * @uses \Eliasis\Complement\Traits\ComplementState->changeState()
     * @uses \Eliasis\Complement\Complement->$complement
     *
     * @return bool
     */
    public function install()
    {
        if (! isset($this->complement['installation-files'])) {
            self::$errors[] = [
                'message' => $this->complement['path']['root']
            ];

            return false;
        }

        $this->deleteDirectory();
        $this->changeState();

        $installed = $this->installComplement(
            $this->complement['installation-files'],
            $this->complement['path']['root'],
            $this->complement['slug']
        );

        if ($installed) {
            self::load(
                $this->complement['config-file'],
                $this->complement['path']['root']
            );

            $this->changeState();

            return true;
        }

        return false;
    }

    /**
     * Delete complement.
     *
     * @uses \Eliasis\Complement\Traits\ComplementState->getState()
     * @uses \Eliasis\Complement\Traits\ComplementState->setState()
     * @uses \Eliasis\Complement\Traits\ComplementState->changeState()
     *
     * @return bool true
     */
    public function remove()
    {
        $this->setState('uninstall');

        $this->changeState();

        if (! $this->deleteDirectory()) {
            $this->setState('uninstalled');
        }

        return true;
    }

    /**
     * Delete complement directory.
     *
     * @uses \Eliasis\Complement\Complement->$complement
     * @uses \Eliasis\Complement\Complement::$errors
     * @uses \Eliasis\Complement\Traits\ComplementHandler::getType()
     * @uses \Josantonius\File\File::deleteDirRecursively()
     *
     * @return string → complement state
     */
    private function deleteDirectory()
    {
        $path = $this->complement['path']['root'];

        if (! $this->validateRoute($path)) {
            return false;
        }

        $isUninstall = ($this->getState() === 'inactive');

        if (! File::deleteDirRecursively($path) && $isUninstall) {
            $type = self::getType('ucfirst', false);

            $msg = $type . " doesn't exist in '$path' or couldn't be deleted.";

            self::$errors[] = ['message' => $msg];

            return false;
        }

        return true;
    }

    /**
     * Install complement.
     *
     * @param array  $complement → complement files
     * @param string $path       → complement path
     * @param string $slug       → complement slug
     * @param bool   $root       → root folder
     *
     * @uses \Eliasis\Framework\App::COMPLEMENT_URL()
     * @uses \Eliasis\Complement\Traits\ComplementHandler::getType()
     * @uses \Josantonius\File\File::createDir()
     *
     * @return bool
     */
    private function installComplement($complement, $path, $slug, $root = true)
    {
        $path = ($root) ? $path : $path . key($complement) . '/';

        if (! $this->validateRoute($path)) {
            return false;
        }

        if (! File::createDir($path)) {
            $msg = "The directory exists or couldn't be created in: $path";
            self::$errors[] = ['message' => $msg];

            return false;
        }

        foreach ($complement as $folder => $file) {
            foreach ($file as $key => $val) {
                if (is_array($val)) {
                    $this->installComplement([$key => $val], $path, $slug, 0);
                    continue;
                }

                $filePath = $path . $val;

                $complementType = self::getType('strtoupper');
                $complementPath = App::$complementType() . $slug . '/';

                $url = Url::addBackSlash($this->complement['url-import']);
                $route = str_replace($complementPath, '', $filePath);
                $fileUrl = $url . '/' . $route;

                $this->saveRemoteFile($fileUrl, $filePath);
            }
        }

        return true;
    }

    /**
     * Save remote file.
     *
     * @param string $fileUrl  → remote file url
     * @param string $filePath → file path to save
     *
     * @return bool
     */
    private function saveRemoteFile($fileUrl, $filePath)
    {
        if (! $file = @file_get_contents($fileUrl)) {
            self::$errors[] = [
                'message' => 'Error to download file: ' . $fileUrl
            ];

            return false;
        }

        if (! @file_put_contents($filePath, $file)) {
            self::$errors[] = [
                'message' => 'Failed to save file to: ' . $filePath
            ];

            return false;
        }

        return true;
    }

    /**
     * Validate path to only install/remove complements in default directory.
     *
     * @param string $path → complement path
     *
     * @uses \Eliasis\Framework\App::COMPLEMENT()
     * @uses \Eliasis\Complement\Traits\ComplementHandler::getType()
     *
     * @return bool
     */
    private function validateRoute($path)
    {
        $complementType = self::getType('strtoupper');

        $thePath = App::$complementType();

        if ($thePath == $path || strpos($path, $thePath) === false) {
            $type = self::getType('ucfirst', false);
            $msg = 'The ' . $type . " path: '$path' isn't a valid route.";
            self::$errors[] = ['message' => $msg];

            return false;
        }

        return true;
    }
}
