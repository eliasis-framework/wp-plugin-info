<?php
/**
 * WP Plugin Info · Get and save plugin information from WordPress API.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   Josantonius\WP_Plugin_Info
 * @copyright 2017 - 2018 (c) Josantonius - WP_Plugin_Info
 * @license   https://opensource.org/licenses/GPL-2.0 - GPL-2.0+
 * @link      https://github.com/Josantonius/wp-plugin-info.git
 * @since     1.0.3
 */
session_start();

require __DIR__ . '/../vendor/autoload.php';

use Eliasis\Complement\Type\Plugin;
use Josantonius\File\File;

/**
 * Load theme and plugins for testing environment.
 */
function _manually_load_environment() {
	switch_theme( 'twentyseventeen' );
}

define( 'WP_CORE_DIR', '/tmp/wordpress/' );

define( 'WP_TESTS_DIR', '/tmp/wordpress-tests-lib' );

require_once WP_TESTS_DIR . '/includes/functions.php';

tests_add_filter( 'muplugins_loaded', '_manually_load_environment' );

require_once WP_TESTS_DIR . '/includes/bootstrap.php';

/*
 * Clone complement.
 */
$plugin = 'wp-plugin-info';

$path = 'sample-app/plugins';

File::deleteDirRecursively( __DIR__ . '/sample-app/plugins/' );

File::copyDirRecursively(
	__DIR__ . '/../config/',
	__DIR__ . "/$path/$plugin/config/"
);

File::copyDirRecursively(
	__DIR__ . '/../src/',
	__DIR__ . "/$path/$plugin/src/"
);

copy(
	__DIR__ . "/../$plugin.jsond",
	__DIR__ . "/$path/$plugin/$plugin.jsond"
);
