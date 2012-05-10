
function hide_all_steps() {
	$('.signupStep').hide();
}

function hide_form_errors() {
	$('.errorExplanation, .formError').remove();
	$('.fieldWithErrors').removeClass('fieldWithErrors');
}

function go_back_to_previous_step(e) {
	// check to make sure button is not disabled.
	if(is_element_disabled(e)) {
		return false;
	}
	var s = current_step() - 2;
	go_to_signup_step(s);
}

function go_to_signup_step(step) {
	hide_all_steps();
	$('#signup_step_' + step).show();
	$('#step').val(step + 1);
	
	na.renter_step_signup.indicator(step);
	na.renter_step_signup.nav_buttons(step);
}

function current_step() {
	return parseInt($('#step').val());
}

na.renter_step_signup = {
	nav_buttons: function(step) {
		var c = {
			"backStep": [2,3],
			"nextStep": [1,2],
			"createAccountStep": [3]
		};
		
		for(x in c) {
			var elm = $('#' + x);
			if($.inArray(step, c[x]) > -1) {
				elm.show();
			} else {
				elm.hide();
			}
		}
		
	},
	indicator: function(step) {
		$('#currentStepIndicator span').html(step);
	},
	hide_ajax_loader: true
};

$(document).ready(function() {	
	na.remote_forms('#renter_signup ', {
		after_ajax_send: function() {
			// disable buttons and show loader
			disable_element('.formActions .button');
			$('#ajaxLoaderContainer').html(ajax_loader());
		},
		after_ajax_complete: function() {
			// enable buttons and hide loader
			if(na.renter_step_signup.hide_ajax_loader){
				enable_element('.formActions .button');
				$('#ajaxLoaderContainer').html('');
			}
		},
		after_ajax_success: function() {
			// setup nav buttons
			na.renter_step_signup.nav_buttons(current_step() - 1);
			
			// reinit event handlers
			na.init_global_events();
			// RenterProfile.setup();
			BoroughsSelection.setup();
			
			new na.submit_button('#createAccountStep', {
				before_submit: RenterProfile.agree_to_terms
			}).init();
			
			// user may have errors, so scroll to top
			na.scrollTop();
		}
	});
});