<?php
/**
 * WP Plugin Info · Get and save plugin information from WordPress API.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @package   eliasis-framework\wp-plugin-info
 * @copyright 2017 - 2018 (c) Josantonius - wp-plugin-info
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/eliasis-framework/wp-plugin-info.git
 * @since     1.0.0
 */

use Eliasis\Complement\Type\Plugin;

$path = Plugin::WP_Plugin_Info()->getOption( 'path', 'data' );

return [
	'file' => [
		'config'  => $path . 'config.jsond',
		'plugins' => $path . 'plugins.jsond',
	],
];
