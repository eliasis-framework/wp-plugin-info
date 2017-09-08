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

use Eliasis\Complement\Type\Plugin\Plugin;

$namespace = Plugin::WP_Plugin_Info()->get('namespaces', 'controller');

$class = $namespace . 'Launcher\Launcher';

return [

    'hooks' => [

        ['launch-modules', [$class, 'init'], 8, 0],
    ]
];
