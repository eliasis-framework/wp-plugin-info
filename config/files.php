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

$path = Plugin::WP_Plugin_Info()->getOption('path', 'data');

return [
    'file' => [
        'config' => $path . 'config.jsond',
        'plugins' => $path . 'plugins.jsond',
    ],
];
