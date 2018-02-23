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

namespace Eliasis\Plugins\WP_Plugin_Info;

use Eliasis\Complement\Type\Plugin;
use Eliasis\Framework\App;

/**
 * Tests class for WP_Plugin_info Eliasis plugin.
 */
final class WP_Plugin_Info_Test extends \WP_UnitTestCase {

	/**
	 * App instance.
	 *
	 * @since 1.0.4
	 *
	 * @var object
	 */
	protected $app;

	/**
	 * Root path.
	 *
	 * @since 1.0.4
	 *
	 * @var string
	 */
	protected $root;

	/**
	 * Plugin instance.
	 *
	 * @since 1.0.4
	 *
	 * @var object
	 */
	protected $plugin;

	/**
	 * Set up.
	 */
	public function setUp() {

		parent::setUp();

		$this->app  = new App();
		$this->root = $_SERVER['DOCUMENT_ROOT'];

		$plugin = new Plugin();

		$app = $this->app;
		$app::run( $this->root );

		$this->plugin = $plugin::WP_Plugin_Info()->getControllerInstance( 'Main' );
	}

	/**
	 * Check if it is an instance of.
	 *
	 * @since 1.0.4
	 */
	public function test_is_instance_of() {
		$this->assertInstanceOf( 'Eliasis\Framework\App', $this->app );
		$this->assertInstanceOf(
			'Eliasis\Plugins\WP_Plugin_Info\Controller\Main',
			$this->plugin
		);
	}

	/**
	 * Get all the information about the plugin.
	 */
	public function test_get_all_plugin_info() {
		$plugin = $this->plugin;

		$plugin = $plugin->get( '*', 'extensions-for-grifus' );

		$this->assertContains( 'extensions-for-grifus', $plugin['slug'] );
	}

	/**
	 * Get WordPress plugin name.
	 */
	public function test_get_plugin_name() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'name', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin slug.
	 */
	public function test_get_plugin_slug() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'slug', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin version.
	 */
	public function test_get_plugin_version() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'version', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin author.
	 */
	public function test_get_plugin_author() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'author', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin author profile.
	 */
	public function test_get_plugin_author_profile() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'author_profile', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin contributors.
	 */
	public function test_get_plugin_contributors() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'array',
			$plugin->get( 'contributors', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin requires.
	 */
	public function test_get_plugin_requires() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'requires', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin tested.
	 */
	public function test_get_plugin_tested() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'tested', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin compatibility.
	 */
	public function test_get_plugin_compatibility() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'array',
			$plugin->get( 'compatibility', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin rating.
	 */
	public function test_get_plugin_rating() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'int',
			$plugin->get( 'rating', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin ratings.
	 */
	public function test_get_plugin_ratings() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'array',
			$plugin->get( 'ratings', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin num ratings.
	 */
	public function test_get_plugin_num_ratings() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'int',
			$plugin->get( 'num_ratings', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin support threads.
	 */
	public function test_get_plugin_support_threads() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'int',
			$plugin->get( 'support_threads', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin support threads resolved.
	 */
	public function test_get_plugin_support_threads_resolved() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'int',
			$plugin->get(
				'support_threads_resolved',
				'extensions-for-grifus'
			)
		);
	}

	/**
	 * Get WordPress plugin downloaded.
	 */
	public function test_get_plugin_downloaded() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'int',
			$plugin->get( 'downloaded', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin last updated.
	 */
	public function test_get_plugin_last_updated() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'last_updated', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin added.
	 */
	public function test_get_plugin_added() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'added', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin homepage.
	 */
	public function test_get_plugin_homepage() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'homepage', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin download link.
	 */
	public function test_get_plugin_download_link() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'download_link', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin tags.
	 */
	public function test_get_plugin_tags() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'array',
			$plugin->get( 'tags', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin donate link.
	 */
	public function test_get_plugin_donate_link() {
		$plugin = $this->plugin;

		$this->assertInternalType(
			'string',
			$plugin->get( 'donate_link', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin unknown param.
	 */
	public function test_get_plugin_unknown_param() {
		$plugin = $this->plugin;

		$this->assertFalse(
			$plugin->get( 'unknown', 'extensions-for-grifus' )
		);
	}

	/**
	 * Get WordPress plugin unknown param.
	 */
	public function test_get_plugin_unknown_plugin() {
		$plugin = $this->plugin;

		$this->assertFalse(
			$plugin->get( 'name', 'unknown' )
		);
	}

	/**
	 * Get WordPress plugin unknown param.
	 */
	public function test_get_plugin_unknown_param_and_plugin() {
		$plugin = $this->plugin;

		$this->assertFalse(
			$plugin->get( 'unknown', 'unknown' )
		);
	}
}
