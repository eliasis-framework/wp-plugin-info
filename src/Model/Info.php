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
namespace Eliasis\Plugins\WP_Plugin_Info\Model;

use Eliasis\Framework\Model;
use Josantonius\Json\Json;

/**
 * Info model.
 *
 * @since 1.0.0
 */
class Info extends Model
{
    /**
     * Get current plugins information.
     *
     * @since 1.0.0
     *
     * @param string $file → filepath
     *
     * @return array|false → plugins info
     */
    public function getPluginsInfo($file)
    {
        return Json::fileToArray($file);
    }

    /**
     * Set plugins Info.
     *
     * @since 1.0.0
     *
     * @param array  $plugins → plugins information
     * @param string $file    → filepath
     *
     * @return bool true or throw JsonException
     */
    public function setPluginsInfo($plugins, $file)
    {
        return Json::arrayToFile($plugins, $file);
    }
}
