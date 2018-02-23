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

/**
 * Complement requests handler class.
 */
trait ComplementRequest
{
    /**
     * Request parameters.
     *
     * @var array
     */
    protected static $config;

    /**
     * HTTP request handler.
     *
     * @param string $type → complement type
     *
     * @uses \Eliasis\Framework\App::setCurrentID()
     */
    public static function requestHandler($type)
    {
        if (! self::validateRequest($type)) {
            return false;
        }

        App::setCurrentID(self::$config['app']);

        self::loadRemoteComplements();

        switch (self::$config['request']) {
            case 'load-complements':
                self::complementsLoadRequest();
                break;
            case 'change-state':
                self::changeStateRequest();
                break;
            case 'install':
                self::installRequest();
                break;
            case 'update':
                self::installRequest(true);
                break;
            case 'uninstall':
                self::uninstallRequest();
                break;
            default:
                self::$errors[] = [
                    'message' => 'Unknown request: ' . self::$config['request'],
                ];
                echo json_encode(['errors' => self::$errors]);
                break;
        }

        if (empty(App::getOption('development-environment'))) {
            die;
        }
    }

    /**
     * Validate the request.
     *
     * @param string $type → complement type
     *
     * @return bool
     */
    public static function validateRequest($type)
    {
        $hasValidParams = isset(
            $_POST['id'],
            $_POST['app'],
            $_POST['remote'],
            $_POST['request'],
            $_POST['complement'],
            $_POST['nonce'],
            $_POST['filter'],
            $_POST['sort'],
            $_SESSION['efc'],
            $_SERVER['HTTP_X_REQUESTED_WITH']
        );

        if (! $hasValidParams || ! self::sanitizeParams()) {
            return false;
        }

        if (self::$config['complement'] !== $type) {
            return false;
        }

        $isAjaxRequest = $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

        $isValidNonce = self::$config['nonce'] === $_SESSION['efc'];

        if (! $isAjaxRequest || ! $isValidNonce) {
            return false;
        }

        return true;
    }

    /**
     * Sanitize request parameters.
     *
     * @since 1.1.0
     *
     * @return bool
     */
    public static function sanitizeParams()
    {
        self::$config['remote'] = [];

        $remote = is_array($_POST['remote']) ? $_POST['remote'] : [];
        foreach ($remote as $complement => $url) {
            $url = filter_var($url, FILTER_VALIDATE_URL);
            if ($url === false) {
                return false;
            }
            self::$config['remote'][$complement] = $url;
        }

        $params = ['id', 'app', 'request', 'filter', 'sort', 'nonce', 'complement'];

        foreach ($params as $param) {
            $value = filter_var($_POST[$param], FILTER_SANITIZE_STRING);
            if ($value === false) {
                return false;
            }
            self::$config[$param] = $value;
        }

        return true;
    }

    /**
     * Load remote complements.
     *
     * @uses \Eliasis\Complement\Complement->$instances
     * @uses \Eliasis\Complement\Complement::load()
     * @uses \Eliasis\Complement\Complement::$errors
     */
    private static function loadRemoteComplements()
    {
        $currentID = App::getCurrentID();
        $complement = self::getType();
        $remote = self::$config['remote'];

        $complements = array_keys(self::$instances[$currentID][$complement]);

        foreach ($remote as $complement => $url) {
            if (! in_array($complement, $complements, true)) {
                self::load($url);
            }

            self::$complement()->setOption('config-url', $url);
        }
    }

    /**
     * Complements load request.
     *
     * @uses \Eliasis\Complement\Complement::getList()
     * @uses \Eliasis\Complement\Complement::$errors
     */
    private static function complementsLoadRequest()
    {
        $complements = self::getList(self::$config['filter'], self::$config['sort']);

        $response = [
            'complements' => array_values($complements),
            'errors' => self::$errors,
        ];

        echo json_encode($response);
    }

    /**
     * Change state request.
     *
     * @uses \Eliasis\Complement\Complement::getInstance()
     * @uses \Eliasis\Complement\Traits\ComplementState->changeState()
     * @uses \Eliasis\Complement\Complement::$errors
     */
    private static function changeStateRequest()
    {
        self::$id = self::$config['id'];
        $that = self::getInstance();
        $state = $that->changeState();

        $response = [
            'state' => $state,
            'errors' => self::$errors,
        ];

        echo json_encode($response);
    }

    /**
     * Install request.
     *
     * @param string $isUpdate → if it is an update
     *
     * @uses \Eliasis\Complement\Complement::getInstance()
     * @uses \Eliasis\Complement\Traits\ComplementImport->install()
     * @uses \Eliasis\Complement\Complement::$errors
     */
    private static function installRequest($isUpdate = false)
    {
        self::$id = self::$config['id'];

        $that = self::getInstance();

        $that->install();

        $that->setState($isUpdate ? 'active' : 'inactive');

        $complements = self::getList(self::$config['filter'], self::$config['sort']);

        $complement = $complements[self::$id];

        $response = [
            'complement' => $complement,
            'errors' => self::$errors,
        ];

        echo json_encode($response);
    }

    /**
     * Uninstall request.
     *
     * @uses \Eliasis\Complement\Complement::getInstance()
     * @uses \string ComplementImport->remove()
     * @uses \Eliasis\Complement\Complement::$errors
     */
    private static function uninstallRequest()
    {
        self::$id = self::$config['id'];
        $that = self::getInstance();
        $that->remove();
        $state = 'uninstalled';

        $response = [
            'state' => $state,
            'errors' => self::$errors,
        ];

        echo json_encode($response);
    }
}
