<?php

/**
 * This is a detailed class framework for producing notifications
 *
 * @version 1.0.0
 */

if ( ! class_exists( 'Notifications' ) ) {
	class Notifications {

		/**
		 * Class constructor
		 */
		public function __construct() {

		}

		/**
		 * Static generic notification function that will use default values, so that instances does not need to be created.
		 *
		 * @param string $type The notification type
		 * @param string $message The message to be displayed
		 * @return string
		 * @since 1.0.0
		 */
		public static function notification( $type = '', $message = '' ) {
			return sprintf( '<div class="notification %1$s">%2$s</div>', $type, $message );
		}

		/**
		 * Static Information notification function that will use default values, so that instances does not need to be created.
		 *
		 * @param string $message
		 * @return string
		 * @since 1.0.0
		 */
		public static function information( $message = '' ) {
			return self::notification( 'information', $message );
		}

		/**
		 * Static Success notification function that will use default values, so that instances does not need to be created.
		 *
		 * @param string $message
		 * @return string
		 * @since 1.0.0
		 */
		public static function success( $message = '' ) {
			return self::notification( 'success', $message );
		}

		/**
		 * Static Warning notification function that will use default values, so that instances does not need to be created.
		 *
		 * @param string $message
		 * @return string
		 * @since 1.0.0
		 */
		public static function warning( $message = '' ) {
			return self::notification( 'warning', $message );
		}

		/**
		 * Static Danger notification function that will use default values, so that instances does not need to be created.
		 *
		 * @param string $message
		 * @return string
		 * @since 1.0.0
		 */
		public static function danger( $message = '' ) {
			return self::notification( 'danger', $message );
		}
	}
}