<?php

/**
 * Plugin Name: WordPress Username Checker
 * Author: Adrian Du Plessis
 * Author URI: https://github.com/Jogger71
 *
 * Description: This very lightweight plugin allows front end users to check if their email has been registered on your site or not
 *
 * Version: 0.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheaters Detected!' );
}

if ( ! class_exists( 'WP_Username_Checker' ) ) {
	class WP_Username_Checker {
		/**
		 * Using the singleton design pattern, this will be the one and only instance of the class
		 *
		 * @var WP_Username_Checker $instance The only instance that SHOULD exist of this class
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * The variable that will store the shortcode class
		 *
		 * @var
		 */

		/**
		 * Class constructor
		 */
		private function __construct() {

		}

		/**
		 * Function that will allow the user to get the instance of the class
		 *
		 * @return WP_Username_Checker
		 * @since 1.0.0
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WP_Username_Checker ) ) {
				self::$instance = new WP_Username_Checker();
			}

			return self::$instance;
		}

		/**
		 * This function creates all the constants
		 *
		 * @since 1.0.0
		 */
		public function define_constants() {
			if ( ! defined( 'WPUC_DIR' ) ) {
				define( 'WPUC_DIR', dirname( __FILE__ ) );
			}

			if ( ! defined( 'WPUC_PATH' ) ) {
				define( 'WPUC_PATH', plugins_url( '', __FILE__ ) );
			}
		}

		/**
		 * This function enqueues all the needed scripts
		 *
		 * @since 1.0.0
		 */
		public function enqueue_scripts() {

		}

		/**
		 * This is a small setup script
		 *
		 * @since 1.0.0
		 */
		public function setup_script() {
			echo '<script type="text/javascript">var adminSetup = ' . admin_url( 'admin-ajax.php' ) . '; </script>';
		}
	}
}