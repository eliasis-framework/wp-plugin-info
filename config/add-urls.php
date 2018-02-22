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
use Eliasis\Complement\Type\Plugin;
use Eliasis\Framework\App;

$url = App::MODULES_URL() . Plugin::WP_Plugin_Info()->getOption('folder');

return [
    'url' => [
        'wp-api' => 'https://api.wordpress.org/plugins/info/1.0/',
    ],
];
