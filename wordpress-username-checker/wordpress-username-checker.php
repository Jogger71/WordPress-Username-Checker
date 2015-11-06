<?php

/**
 * Plugin Name: WordPress Username Checker
 * Author: Adrian Du Plessis
 * Author URI: https://github.com/Jogger71
 *
 * Description: This very lightweight plugin allows front end users to check if their email has been registered on your site or not
 *
 * Version: 1.0.2
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
		 * Instance of the shortcodes class
		 *
		 * @var WPUC_Shortcodes $shortcodes
		 * @since 1.0.0
		 */
		public $shortcodes;

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

				//  Some initialisations
				self::$instance->define_constants();
				self::$instance->include_files();
				self::$instance->create_objects();

				//  Add all the required actions
				add_action( 'wp_enqueue_scripts', array( self::$instance, 'jquery_enqueue' ) );
				add_action( 'wp_enqueue_scripts', array( self::$instance, 'setup_script' ) );
				add_action( 'wp_enqueue_scripts', array( self::$instance, 'enqueue_scripts' ) );
				add_action( 'wp_ajax_username_check', array( self::$instance, 'username_ajax_confirmation' ) );
				add_action( 'wp_ajax_nopriv_username_check', array( self::$instance, 'username_ajax_confirmation' ) );
				add_shortcode( 'wpuc_email_check', array( self::$instance->shortcodes, 'front_end_shortcode' ) );
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

			if ( ! defined( 'WPUC_ASSETS_PATH' ) ) {
				define( 'WPUC_ASSETS_PATH', WPUC_PATH . '/assets' );
			}
		}

		/**
		 * Includes all the required files
		 *
		 * @since 1.0.0
		 */
		public function include_files() {
			include_once( WPUC_DIR . '/classes/class-wpuc-shortcodes.php' );
		}

		/**
		 * Create the required objects
		 *
		 * @since 0.1.0
		 */
		public function create_objects() {
			$this->shortcodes = new WPUC_Shortcodes();
		}

		/**
		 * jQuery setup function
		 *
		 * @since 1.0.0
		 */
		public function jquery_enqueue() {
			$jq_enq = wp_script_is('jquery', 'enqueued');

			if ( ! $jq_enq ) {
				wp_enqueue_script( 'jquery' );
			}

			if ( ! $jq_enq ) {
				wp_enqueue_script( 'jquery_wpuc', WPUC_ASSETS_PATH . '/jquery-1.11.3.min.js' );
			}
		}

		/**
		 * This function enqueues all the needed scripts
		 *
		 * @since 1.0.0
		 */
		public function enqueue_scripts() {
			$jq_enq = wp_script_is('jquery', 'enqueued');
			$wpuc_jq_enq = wp_script_is( 'jquery_wpuc', 'enqueued' );
			$wpuc_enq = wp_script_is( 'wpuc_script', 'enqueued' );

			if ( ! $wpuc_enq && $jq_enq ) {
				wp_enqueue_script( 'wpuc_script', WPUC_ASSETS_PATH . '/scripts.js', array( 'jquery' ) );
			} else if ( ! $wpuc_enq && $wpuc_jq_enq ) {
				wp_enqueue_script( 'wpuc_script', WPUC_ASSETS_PATH . '/scripts.js', array( 'jquery_wpuc' ) );
			}
		}

		/**
		 * This is a small setup script
		 *
		 * @since 1.0.0
		 */
		public function setup_script() {
			echo '<script type="text/javascript">var wpuc_js ={ adminURL: "' . admin_url( 'admin-ajax.php' ) . '" }; </script>';
		}

		/**
		 * Checks that the username does exist through an AJAX call
		 *
		 * @since 1.0.0
		 */
		public function username_ajax_confirmation() {
			include_once( WPUC_DIR . '/classes/class-notifications.php' );

			$email = $_POST[ 'email' ];
			$available = 'You do not have an account on our system, you may create one.';
			$unavailable = sprintf( 'It seems that you do have an account on our system. If you do not know what your password is, <a href="%1$s" target="%2$s">please reset it.</a>', '/my-account/lost-password/', '_blank' );

			if ( email_exists( $email ) ) {
				echo Notifications::success( $unavailable );
			} else {
				echo Notifications::danger( $available );
			}

			wp_die();
		}
	}
}

function wpuc() {
	return WP_Username_Checker::get_instance();
}

wpuc();