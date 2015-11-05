<?php

/**
 * Shortcode class
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheaters Detected' );
}

if ( ! class_exists( 'WPUC_Shortcodes' ) ) {
	class WPUC_Shortcodes {

		/**
		 * Class constructor
		 */
		public function __construct() {

		}

		/**
		 * Front end user email check short code function
		 * @since 1.0.0
		 */
		public function email_check_front_end_shortcode( $atts ) {
			return include WPUC_DIR . "/templates/email_check_form.php";
		}

		/**
		 * Front end user username check short code function
		 *
		 * @since 1.1.0
		 */
		public function username_check_front_end_shortcode($atts)
		{

		}

		/**
		 * Front end username or email check form shortcode function
		 *
		 * @since 1.1.0
		 */
		public function user_availability_front_end_shortcode($atts)
		{

		}
	}
}