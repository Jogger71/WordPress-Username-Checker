jQuery( document ).ready( function ( $ ) {
	$( 'input#wpuc_check_user' ).click( function() {
		check_email( 'username_check')

		var data = {
			'action': 'username_check',
			'email': $( 'input#username_email' ).val()
		};

		$('.wpuc_alert' ).html('<div class="notification warning">Checking Email Address</div>');

		$.post(
			wpuc_js.adminURL,
			data,
			function(response) {
				$('.wpuc_alert' ).html(response);
			}
		)
	});


});

var alert = '.wpuc_alert';

function do_wp_ajax_request( data ) {

}

function create_data( action, title, value ) {
	var data = {
		'action': action,
		title: value
	};

	return data;
}

function update_alert( alert_element, alert_message ) {
	$( alert_element ).html( alert_message );
}

function check_email( action, email ) {
	var data = create_data( action, 'email', email );
	update_alert( alert, '<div class="notification warning">Checking Email Address</div>' );

	$.post(
		wpuc_js.adminURL,
		data,
		function(response) {
			update_alert( alert, response );
		}
	);
}

function check_username( action, username ) {
	var data = create_data( action, 'username', username );
	update_alert( alert, '<div class="notification warning">Checking Username</div>');

	$.post(
		wpuc_js.adminURL,
		data,
		function(response) {
			update_alert( alert, response );
		}
	);
}

function check_either( action, usermail ) {
	var data = create_data( action, 'usermail', usermail );
	update_alert( alert, '<div class="notification warning">Checking Username/Email Address</div>');

	$.post(
		wpuc_js.adminURL,
		data,
		function(response) {
			update_alert( alert, response );
		}
	);
}