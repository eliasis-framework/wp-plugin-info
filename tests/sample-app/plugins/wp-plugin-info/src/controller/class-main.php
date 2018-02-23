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

namespace Eliasis\Plugins\WP_Plugin_Info\Controller;

use Eliasis\Complement\Type\Plugin;
use Eliasis\Framework\Controller;

/**
 * Main controller.
 */
class Main extends Controller {

	/**
	 * Actual plugin slug.
	 *
	 * @var string
	 */
	protected $slug;

	/**
	 * Plugins information.
	 *
	 * @var array
	 */
	protected $plugin = [];

	/**
	 * Get plugin options.
	 *
	 * @param string $option → option to get.
	 * @param string $slug   → WordPress plugin slug.
	 *
	 * @return mixed → value or false
	 */
	public function get( $option, $slug ) {

		if ( $this->is_active() ) {

			$this->prepare( $slug );

			$slug = $this->slug;

			if ( isset( $this->plugin[ $slug ][ $option ] ) ) {
				return $this->plugin[ $slug ][ $option ];
			} elseif ( '*' == $option && isset( $this->plugin[ $slug ] ) ) {
				return $this->plugin[ $slug ];
			}

			return false;
		}
	}

	/**
	 * Check the last update.
	 *
	 * @return bool
	 */
	protected function is_updated() {

		if ( $this->is_active() && isset( $this->plugin[ $this->slug ]['last-update'] ) ) {

			$interval    = Plugin::WP_Plugin_Info()->getOption( 'interval' );
			$last_update = $this->plugin[ $this->slug ]['last-update'];

			if ( ( time() - $last_update ) < $interval ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if plugin is active.
	 *
	 * @return boolean true
	 */
	protected function is_active() {

		return Plugin::WP_Plugin_Info()->getState() === 'active';
	}

	/**
	 * Get plugin info.
	 *
	 * @param string $slug → WordPress plugin slug.
	 */
	protected function prepare( $slug ) {

		$this->slug = $slug;

		$file = Plugin::WP_Plugin_Info()->getOption( 'file', 'plugins' );

		if ( empty( $this->plugin ) ) {

			$this->plugin = $this->model->get_plugins_info( $file );
		}

		if ( ! $this->is_updated() ) {

			$this->plugin[ $slug ] = $this->get_plugin_info( $slug );

			$this->plugin[ $slug ]['last-update'] = time();

			$this->model->set_plugins_info( $this->plugin, $file );
		}
	}

	/**
	 * Get plugin info in WordPress API.
	 *
	 * @param string $slug → WordPress plugin slug.
	 *
	 * @return array → plugin info
	 */
	protected function get_plugin_info( $slug ) {

		$args = (object) [ 'slug' => $slug ];

		$request = [
			'action'  => 'plugin_information',
			'timeout' => 15,
			'request' => serialize( $args ),
		];

		$url = Plugin::WP_Plugin_Info()->getOption( 'url', 'wp-api' );

		$resp = wp_remote_post( $url, [ 'body' => $request ] );

		$resp = isset( $resp['body'] ) ? unserialize( $resp['body'] ) : [];

		unset( $resp->sections, $resp->versions, $resp->screenshots );

		return (array) $resp;
	}
}
