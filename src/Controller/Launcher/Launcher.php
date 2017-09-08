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

namespace Eliasis\Plugins\WP_Plugin_Info\Controller\Launcher;

use Eliasis\Complement\Type\Plugin\Plugin,
    Eliasis\Controller\Controller;
    
/**
 * Plugin main controller.
 *
 * @since 1.0.0
 */
class Launcher extends Controller {

    /**
     * Class initializer method.
     * 
     * @since 1.0.0
     *
     * @return
     */
    public function init() {

        if (Plugin::WP_Plugin_Info()->get('state') === 'active') {

            if (is_admin()) {

                $this->admin();
            } 
        }
    }

    /**
     * Admin initializer method.
     * 
     * @since 1.0.0
     * 
     * @uses add_action() → hooks a function on to a specific action
     */
    public function admin() {

        global $pagenow;

        if ($pagenow === 'admin.php') {

            $method = [$this, 'afterAddMenu'];

            add_action('wp_menu/after_add_menu_page',    $method, 10, 1);
            add_action('wp_menu/after_add_submenu_page', $method, 10, 1);
        }
    }

    /**
     * After add menu, add page load hook.
     *
     * @param string $hook → resulting page's hook_suffix after add menu.
     *
     * @since 1.0.0
     */
    public function afterAddMenu($hook) {

        if ($hook) {

            add_action($hook, function() {

                Plugin::WP_Plugin_Info()->instance('Info')->getPluginsInfo();
            });
        }
    }
}
