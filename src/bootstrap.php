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

function includeIfExists($file) {

    if (file_exists($file)) {
        
        return include $file;
    }
}

if ((!$loader = includeIfExists(__DIR__ . '/../vendor/autoload.php')) && 
	(!$loader = includeIfExists(__DIR__ . '/../../../autoload.php'))) {
    
    die(PHP_EOL . 'You must set up the project dependencies, ' .
    	'run the following commands:' . PHP_EOL .
        PHP_EOL . 'curl -s http://getcomposer.org/installer | php' . PHP_EOL .
        PHP_EOL . 'php composer.phar install' . PHP_EOL . PHP_EOL);
}

return $loader;
