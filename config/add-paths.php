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

use Eliasis\App\App,
    Eliasis\Complement\Type\Plugin\Plugin;

$DS = App::DS;

$ROOT = Plugin::WP_Plugin_Info()->get('path', 'root');

return [

    'path' => [

        'components' => $ROOT.'src'.$DS.'template'.$DS.'components'.$DS,
        'data'       => $ROOT.'src'.$DS.'data'    .$DS,
    ],
];
