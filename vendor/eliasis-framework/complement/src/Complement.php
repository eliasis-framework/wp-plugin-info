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
namespace Eliasis\Complement;

use Eliasis\Complement\Exception\ComplementException;
use Eliasis\Framework\App;
use Josantonius\File\File;
use Josantonius\Json\Json;
use Josantonius\Url\Url;

/**
 * Complement class.
 */
abstract class Complement
{
    use Traits\ComplementHandler;
    use Traits\ComplementAction;
    use Traits\ComplementImport;
    use Traits\ComplementState;
    use Traits\ComplementRequest;
    use Traits\ComplementView;

    /**
     * Complement instances.
     *
     * @var array
     */
    protected static $instances;

    /**
     * Available complements.
     *
     * @var array
     */
    protected $complement = [];

    /**
     * Id of current complement called.
     *
     * @var array
     */
    protected static $id = 'Default';

    /**
     * Errors for file management.
     *
     * @var array
     */
    protected static $errors = [];

    /**
     * Complement type.
     *
     * @var string
     */
    private static $type = 'default';

    /**
     * Receives the name of the complement to execute: Complement::Name().
     *
     * @param string $index  → complement name
     * @param array  $params → params
     *
     * @uses \Eliasis\Framework\App::getCurrentID()
     * @uses \Eliasis\Complement\ComplementHandler::getType()
     *
     * @throws ComplementException → complement not found
     *
     * @return object
     */
    public static function __callstatic($index, $params = false)
    {
        $type = self::getType();
        $appID = App::getCurrentID();

        if (! array_key_exists($index, self::$instances[$appID][$type])) {
            $msg = self::getType('ucfirst', false) . ' or method not found';
            throw new ComplementException($msg . ': ' . $index);
        }

        self::$id = $index;

        $that = self::getInstance();

        if (! $params) {
            return $that;
        }

        $method = (isset($params[0])) ? $params[0] : '';
        $args = (isset($params[1])) ? $params[1] : 0;

        if (method_exists($that, $method)) {
            return call_user_func_array([$that, $method], [$args]);
        }
    }

    /**
     * Load all complements found in the directory.
     *
     * @uses \Eliasis\Complement\ComplementRequest::requestHandler()
     * @uses \Eliasis\Complement\ComplementHandler::getType()
     */
    public static function run()
    {
        if (! session_id()) {
            session_start();
        }

        $complementType = self::getType('strtoupper');

        $path = App::$complementType();

        if ($paths = File::getFilesFromDir($path)) {
            foreach ($paths as $path) {
                if (! $path->isDot() && $path->isDir()) {
                    $_path = Url::addBackSlash($path->getPath());
                    $slug = $path->getBasename();
                    $file = $_path . $slug . '/' . $slug . '.jsond';
                    if (! File::exists($file)) {
                        continue;
                    }
                    self::load($file);
                }
            }
        }

        self::requestHandler(self::getType('strtolower', false));
    }

    /**
     * Load complement configuration from json file and set settings.
     *
     * @param string $file → path or url to the complement configuration file
     *
     * @uses \Josantonius\Json\Json::fileToArray()
     * @uses \Eliasis\Complement\ComplementHandler->setComplement()
     *
     * @return bool true
     */
    public static function load($file)
    {
        $complement = Json::fileToArray($file);
        $complement['config-file'] = $file;
        self::$id = isset($complement['id']) ? $complement['id'] : 'Default';
        $that = self::getInstance();

        return $that->setComplement($complement);
    }

    /**
     * Get components/plugins/modules/templates list.
     *
     * @param string $filter → complement category filter
     * @param string $sort   → PHP sorting function to complements sort
     *
     * @uses \Eliasis\Complement\ComplementHandler::getType()
     * @uses \Eliasis\Framework\App::getCurrentID()
     *
     * @return array $data → complements list
     */
    public static function getList($filter = 'all', $sort = 'asort')
    {
        $data = [];
        $type = self::getType();
        $complementID = self::getCurrentID();
        $appID = App::getCurrentID();
        $complements = array_keys(self::$instances[$appID][$type]);

        foreach ($complements as $id) {
            self::setCurrentID($id);
            $that = self::getInstance();
            $complement = $that->complement;

            if (! isset($complement['category'])) {
                continue;
            }

            $skip = ($filter != 'all' && $complement['category'] != $filter);

            if ($skip || $id == 'Default' || ! $complement) {
                continue;
            }

            if ($that->hasNewVersion() && $complement['state'] === 'active') {
                $complement['state'] = 'outdated';
                $that->setState('outdated');
            }

            $data[$complement['id']] = [
                'id' => $complement['id'],
                'name' => $complement['name'],
                'version' => $complement['version'],
                'description' => $complement['description'],
                'state' => $complement['state'],
                'category' => $complement['category'],
                'path' => $complement['path']['root'],
                'url' => $complement['url'],
                'author' => $complement['author'],
                'author-url' => $complement['author-url'],
                'license' => $complement['license'],
                'state' => $complement['state'],
                'slug' => $complement['slug'],
                'image' => $complement['image'],
                'hooks-controller' => $complement['hooks-controller'],
                'url-import' => $complement['url-import'],
                'extra' => $complement['extra']
            ];
        }

        self::setCurrentID($complementID);

        self::getInstance();

        $sorting = '|asort|arsort|krsort|ksort|rsort|shuffle|sort|';

        strpos($sorting, $sort) ? $sort($data) : asort($data);

        return $data;
    }

    /**
     * Get the current complement ID.
     *
     * @since 1.1.0
     *
     * @return string → complement ID
     */
    public static function getCurrentID()
    {
        return self::$id;
    }

    /**
     * Define the current complement ID.
     *
     * @since 1.1.0
     *
     * @param string $id → complement ID
     *
     * @return bool
     */
    public static function setCurrentID($id)
    {
        $type = self::getType();
        $appID = App::getCurrentID();
        if (array_key_exists($id, self::$instances[$appID][$type])) {
            self::$id = $id;

            return true;
        }

        return false;
    }

    /**
     * Set and get script url.
     *
     * @param string $pathUrl     → url where JS files will be created & loaded
     * @param bool   $vue         → include Vue.js in the script
     * @param bool   $vueResource → include vue-resource in the script
     *
     * @uses \Eliasis\Complement\ComplementView::setFile()
     *
     * @return string → script url
     */
    public static function script($pathUrl = null, $vue = true, $vueResource = true)
    {
        $that = self::getInstance();

        $file = $vue ? 'vue+' : '';
        $file .= $vueResource ? 'vue-resource+' : '';

        return $that->setFile($file . 'eliasis-complement.min', 'script', $pathUrl);
    }

    /**
     * Set and get url style.
     *
     * @param string $pathUrl → url where CSS files will be created & loaded
     *
     * @uses \Eliasis\Complement\ComplementView::setFile()
     *
     * @return array → urls of the styles
     */
    public static function style($pathUrl = null)
    {
        $that = self::getInstance();

        return $that->setFile('eliasis-complement.min', 'style', $pathUrl);
    }

    /**
     * Check if complement exists.
     *
     * @param string $complementID → complement id
     *
     * @uses \Eliasis\Framework\App::getCurrentID()
     * @uses \Eliasis\Complement\ComplementHandler::getType()
     *
     * @return bool
     */
    public static function exists($complementID)
    {
        $type = self::getType();

        return array_key_exists(
            $complementID,
            self::$instances[App::getCurrentID()][$type]
        );
    }

    /**
     * Get library path.
     *
     * @return string → library path
     */
    public static function getLibraryPath()
    {
        return Url::addBackSlash(dirname(__DIR__));
    }

    /**
     * Get library version.
     *
     * @uses \Josantonius\Json\Json::fileToArray()
     *
     * @return string
     */
    public static function getLibraryVersion()
    {
        $path = self::getLibraryPath();
        $composer = Json::fileToArray($path . 'composer.json');

        return isset($composer['version']) ? $composer['version'] : '1.1.1';
    }

    /**
     * Get complements view.
     *
     * @param string $filter       → complements category to display
     * @param array  $remote       → urls of the remote optional complements
     * @param string $sort         → PHP sorting function to complements sort
     * @param array  $translations → translations for button texts
     *
     * @uses \Eliasis\Complement\ComplementView::renderizate()
     *
     * @return bool true
     */
    public static function render($filter = 'all', $remote = null, $sort = 'asort', $translations = null)
    {
        $that = self::getInstance();

        $translations = $translations ?: [
            'active' => 'active',
            'activate' => 'activate',
            'install' => 'install',
            'update' => 'update',
            'uninstall' => 'uninstall'
        ];

        return $that->renderizate($filter, $remote, $sort, $translations);
    }

    /**
     * Get complement instance.
     *
     * @uses \Eliasis\Framework\App::getCurrentID()
     * @uses \Eliasis\Complement\ComplementHandler::getType()
     *
     * @return object → complement instance
     */
    protected static function getInstance()
    {
        $type = self::getType();
        $appID = App::getCurrentID();
        $complementID = self::getCurrentID();
        $complement = get_called_class();
        if (! isset(self::$instances[$appID][$type][$complementID])) {
            self::$instances[$appID][$type][$complementID] = new $complement();
        }

        return self::$instances[$appID][$type][$complementID];
    }
}
