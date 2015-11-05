<?php

/**
 * This is the template file to generate the form to be displayed on the front-end
 * @since 1.1.0
 */

$alert = sprintf(
	'<div class="wpuc_alert"><div class="notification information">%s</div></div>',
	'Enter your email address below to see whether it is registered with us or not.'
);
$email_field = sprintf( '<input type="text" id="user_username" name="user_username" placeholder="%s" />', 'Enter your email here...' );
$submit_button = sprintf( '<input type="submit" id="wpuc_check_email" name="wpuc_check_email" value="%s" />', 'Check Email' );

return $alert . $email_field . $submit_button;