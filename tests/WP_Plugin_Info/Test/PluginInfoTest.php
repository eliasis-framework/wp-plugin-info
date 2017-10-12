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

namespace Eliasis\Plugins\WP_Plugin_Info\Test;

use Eliasis\Complement\Type\Plugin\Plugin;

/**
 * Tests class for WP_Plugin_info Eliasis plugin.
 *
 * @since 1.0.4
 */
final class PluginInfoTest extends \WP_UnitTestCase { 

    /**
     * Info instance.
     *
     * @since 1.0.4
     *
     * @var string
     */
    protected $Info;

    /**
     * Set up.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function setUp() {

        $this->Info = Plugin::WP_Plugin_Info()->instance('Info');
    }

    /**
     * Get plugin instance.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginInstance() {
        
        $class = 'Eliasis\Plugins\WP_Plugin_Info\Controller\Info\Info';

        $this->assertContains($class, get_class($this->Info));
    }

    /**
     * If the plugin information is not updated.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testCheckIfPluginInfoIsNotUpdated() {
        
        $this->assertFalse(

            $this->Info->isUpdated()
        );
    }

    /**
     * Get all the information about the plugin.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetAllPluginInfo() {
        
        $plugin = $this->Info->get('*', 'extensions-for-grifus');

        $this->assertContains('extensions-for-grifus',$plugin['slug']);
    }

    /**
     * If the plugin information is updated.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testCheckIfPluginInfoIsUpdated() {
        
        $this->assertTrue(

            $this->Info->isUpdated()
        );
    }

    /**
     * Get WordPress plugin name.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginName() {

        $this->assertInternalType('string',

            $this->Info->get('name', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin slug.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginSlug() {

        $this->assertInternalType('string',

            $this->Info->get('slug', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin version.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginVersion() {

        $this->assertInternalType('string',

            $this->Info->get('version', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin author.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginAuthor() {

        $this->assertInternalType('string',

            $this->Info->get('author', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin author profile.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginAuthorProfile() {

        $this->assertInternalType('string',

            $this->Info->get('author_profile', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin contributors.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginContributors() {

        $this->assertInternalType('array',

            $this->Info->get('contributors', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin requires.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginRequires() {

        $this->assertInternalType('string',

            $this->Info->get('requires', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin tested.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginTested() {

        $this->assertInternalType('string',

            $this->Info->get('tested', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin compatibility.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginCompatibility() {

        $this->assertInternalType('array',

            $this->Info->get('compatibility', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin rating.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginRating() {

        $this->assertInternalType('int',

            $this->Info->get('rating', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin ratings.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginRatings() {

        $this->assertInternalType('array',

            $this->Info->get('ratings', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin num ratings.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginNumRatings() {

        $this->assertInternalType('int',

            $this->Info->get('num_ratings', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin support threads.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginSupportThreads() {

        $this->assertInternalType('int',

            $this->Info->get('support_threads', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin support threads resolved.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginSupportThreadsResolved() {

        $this->assertInternalType('int',

            $this->Info->get(

                'support_threads_resolved', 
                'extensions-for-grifus'
            )
        );
    }

    /**
     * Get WordPress plugin downloaded.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginDownloaded() {

        $this->assertInternalType('int',

            $this->Info->get('downloaded', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin last updated.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginLastUpdated() {

        $this->assertInternalType('string',

            $this->Info->get('last_updated', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin added.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginAdded() {

        $this->assertInternalType('string',

            $this->Info->get('added', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin homepage.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginHomepage() {

        $this->assertInternalType('string',

            $this->Info->get('homepage', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin download link.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginDownloadLink() {

        $this->assertInternalType('string',

            $this->Info->get('download_link', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin tags.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginTags() {

        $this->assertInternalType('array',

            $this->Info->get('tags', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin donate link.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginDonateLink() {

        $this->assertInternalType('string',

            $this->Info->get('donate_link', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin unknown param.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginUnknownParam() {

        $this->assertFalse(

            $this->Info->get('unknown', 'extensions-for-grifus')
        );
    }

    /**
     * Get WordPress plugin unknown param.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginUnknownPlugin() {

        $this->assertFalse(

            $this->Info->get('name', 'unknown')
        );
    }

    /**
     * Get WordPress plugin unknown param.
     *
     * @since 1.0.4
     *
     * @return void
     */
    public function testGetPluginUnknownParamAndPlugin() {

        $this->assertFalse(

            $this->Info->get('unknown', 'unknown')
        );
    }
}
