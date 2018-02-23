<?php
/**
 * WP Plugin Info · Get and save plugin information from WordPress API.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   Josantonius\WP_Plugin_Info
 * @copyright 2017 - 2018 (c) Josantonius - WP_Plugin_Info
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/wp-plugin-info.git
 * @since     1.0.0
 */

use Eliasis\Complement\Type\Plugin;
use Eliasis\Framework\App;

$url = App::MODULES_URL() . Plugin::WP_Plugin_Info()->getOption( 'folder' );

return [
	'url' => [
		'wp-api' => 'https://api.wordpress.org/plugins/info/1.0/',
	],
];
