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
		 * Front user check short code function
		 */
		public function front_end_shortcode( $atts ) {
			$string = '';
			$string .= sprintf(
				'<div class="wpuc_alert"><div class="notification information">%s</div></div>',
				'Enter your email address below to see whether it is registered with us or not.'
			);
			$string .= sprintf( '<input type="text" id="username_email" name="username_email" placeholder="%s" />', 'Enter your email here...' );
			$string .= sprintf( '<input type="submit" id="wpuc_check_user" name="wpuc_check_user" value="%s" />', 'Check Email' );
			return $string;
		}
	}
}