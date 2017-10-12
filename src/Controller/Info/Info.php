<?php
/**
 * WP Plugin Info · Eliasis plugin for WordPress plugins
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/WP_Plugin-Info.git
 * @since      1.0.0
 */

namespace Eliasis\Plugins\WP_Plugin_Info\Controller\Info;

use Eliasis\Complement\Type\Plugin\Plugin,
    Eliasis\Controller\Controller;
    
/**
 * Info controller.
 *
 * @since 1.0.0
 */
class Info extends Controller {

    /**
     * Actual plugin slug.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected $slug;

    /**
     * Plugins information.
     *
     * @since 1.0.0
     *
     * @var array
     */
    protected $plugin = [];

    /**
     * Get plugin options.
     *
     * @since 1.0.0
     *
     * @param string $option → option to get
     * @param string $slug   → WordPress plugin slug
     *
     * @return mixed → value or false
     */
    public function get($option, $slug) {

        if (Plugin::WP_Plugin_Info()->get('state') === 'active') {

            $this->prepare($slug);

            if (isset($this->plugin[$this->slug][$option])) {

                return $this->plugin[$this->slug][$option];
            
            } else if ($option == '*' && isset($this->plugin[$this->slug])) {

                return $this->plugin[$this->slug];
            }

            return false;
        }
    }

    /**
     * Get plugin info.
     * 
     * @since 1.0.0
     *
     * @param string $slug → WordPress plugin slug
     *
     * @return void
     */
    protected function prepare($slug) {

        $this->slug = $slug;

        $file = Plugin::WP_Plugin_Info()->get('file', 'plugins');

        if (empty($this->plugin)) {

            $this->plugin = $this->model->getPluginsInfo($file);
        }

        if (!$this->isUpdated()) {

            $this->plugin[$this->slug] = $this->getPluginInfo($this->slug);

            $this->plugin[$this->slug]['last-update'] = time();

            $this->model->setPluginsInfo($this->plugin, $file);
        }
    }

    /**
     * Check the last update.
     * 
     * @since 1.0.0
     *
     * @return boolean
     */
    public function isUpdated() {

        if (isset($this->plugin[$this->slug]['last-update'])) {

            $interval = Plugin::WP_Plugin_Info()->get('interval');

            $lastUpdate = $this->plugin[$this->slug]['last-update'];

            if ((time() - $lastUpdate) < $interval) {

                return true;
            }
        }

        return false;
    }

    /**
     * Get plugin info in WordPress API.
     *
     * @since 1.0.0
     *
     * @param string $slug → WordPress plugin slug
     *
     * @return array → plugin info
     */
    protected function getPluginInfo($slug) {

        $args = (object) ['slug' => $slug];
     
        $request = [

            'action'  => 'plugin_information', 
            'timeout' => 15, 
            'request' => serialize($args)
        ];
     
        $url = Plugin::WP_Plugin_Info()->get('url', 'wp-api');
     
        $resp = wp_remote_post($url, ['body' => $request]);

        $resp = isset($resp['body']) ? unserialize($resp['body']) : [];

        unset($resp->sections, $resp->versions, $resp->screenshots);

        return (array) $resp;
    }
}
