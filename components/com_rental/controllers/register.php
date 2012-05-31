<?php

class RentalControllerRegister extends JController
{
	function renter()
	{
		// Get the document object.
		$document =& JFactory::getDocument();
		
		// Set the MIME type for JSON output.
		$document->setMimeEncoding('text/javascript');
		
		header('Content-Type: text/javascript; charset=' . $document->getCharset());
		
		$contents = "hide_form_errors();
					 hide_all_steps();
					 $('#signup_step_2').show();
					 $('#step').val('3');
					 na.renter_step_signup.indicator(2);";
		
		$contents = str_replace('/', '\/', preg_replace('/[\r\n]+/', null, $contents));
		$contents = str_replace('"', '\"', $contents);
		$contents = str_replace("'", "\'", $contents);
		
		echo $contents;
		
		jexit();
	}
}