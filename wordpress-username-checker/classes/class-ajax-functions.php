<?php

/**
 * This is the ajax handling functions for WordPress Username Checker Plugin
 *
 * Class cannot be inherited and multiple copies cannot exist
 *
 * @since 1.1.0
 */

if ( ! class_exists( 'AJAX_FUNCTIONS' ) ) {
	final class AJAX_FUNCTIONS {

		/**
		 * Instance variable to store the single available instance
		 *
		 * @since 1.1.0
		 */
		private static $instance;

		/**
		 * Class constructor
		 */
		private function __construct() {

		}

		/**
		 * Function that returns the instance of the class
		 *
		 * @since 1.1.0
		 */
		public static function get_instance()
		{
			if ( ! isset( self::$instance ) && ! self::$instance instanceof AJAX_FUNCTIONS ) {
				self::$instance = new AJAX_FUNCTIONS();
			}

			return self::$instance;
		}
	}
}

function wpuc_ajax_functions() {
	return AJAX_FUNCTIONS::get_instance();
}
