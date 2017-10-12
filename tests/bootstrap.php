<?php
/**
 * WP Plugin Info · Eliasis plugin for WordPress plugins
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/WP_Plugin-Info.git
 * @since      1.0.3
 */

use Eliasis\App\App,
	Josantonius\File\File;

$loader = require __DIR__ . '/../src/bootstrap.php';

$loader->add('Eliasis\Plugins\WP_Plugin_Info\Test', __DIR__);

define('WP_CORE_DIR', '/tmp/wordpress/');

define('WP_TESTS_DIR', '/tmp/wordpress-tests-lib');

require_once WP_TESTS_DIR . '/includes/functions.php';

function _manually_load_environment() {

    switch_theme('twentyseventeen');

    $file = 'wp_plugin-info.jsond';

    $plugin = WP_CORE_DIR . 'wp-content/plugins/sample/';

    $complement = $plugin . '/plugins/wp_plugin-info/';

	File::deleteDirRecursively($plugin);

	File::copyDirRecursively(__DIR__.'/../', $complement);

	App::run($plugin, 'wordpress-plugin');
}

tests_add_filter('muplugins_loaded', '_manually_load_environment');

require_once WP_TESTS_DIR . '/includes/bootstrap.php';
