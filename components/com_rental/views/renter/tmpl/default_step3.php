<?php 
if($this->checkErrors) {
	$contents = $this->loadTemplate('step1');
	$contents = str_replace('/', '\/', preg_replace('/[\r\n]+/', null, $contents));
	$contents = str_replace('"', '\"', $contents);
	$contents = str_replace("'", "\'", $contents);
	$contents = "$('#new_renter').replaceWith('".$contents."');";
	echo $contents; ?>
<?php 	
} else {
?>
hide_form_errors();
<?php }; ?>
hide_all_steps();
$('#signup_step_3').show();
$('#step').val('4');
na.renter_step_signup.indicator(3);