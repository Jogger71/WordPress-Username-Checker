jQuery( document ).ready( function ( $ ) {
	$( 'input#wpuc_check_user' ).click( function() {
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