<?php

class RentalControllerUser_man extends JController
{
	public function create_fb_user()
	{
		$facebook = new Facebook(array(
			'appId'  => CFG_FACEBOOK_API_ID,
		  	'secret' => CFG_FACEBOOK_API_SECRET,
		));
		
		$userFB = $facebook->getUser();
		$fbMe	= null;
		
		// CHECK LOGEDIN FB
		if ($userFB) {
			try {
		    	// Proceed knowing you have a logged in user who's authenticated.
		    	$fbMe = $facebook->api('/me');
		  	} catch (FacebookApiException $e) {
		    	$userFB = null;
		  	}
		}
		
		$logoutUrl	= '';
		$loginUrl	= '';
		
		if ($userFB) {
			$logoutUrl	= $facebook->getLogoutUrl();
		} else {
		  	$loginUrl	= $facebook->getLoginUrl(
		  		array(
		  			'scope' => 'email, publish_stream',
		  			'redirect_uri' => JRoute::_(JURI::root() . 'index.php?option=com_profile&task=customer.fbregistration', false)
		  		)
			);
			// TODO REQUEST LOGIN BEFORE SAVE FB ACCOUNT
			return false;
		}
		
		// REGISTER DATA
		if ($fbMe) {
			// FIND IF EXISTED EMAIL
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->select('COUNT(*)')->from('#__users')->where('email = ' . $db->quote($fbMe['email']));			
			$db->setQuery($query);
			$duplicate = (bool) $db->loadResult();
			
			if (!$duplicate) {
				$user = new JUser;
				
				$data['email']		= $fbMe['email'];
				$data['username']	= $fbMe['email'];
				$data['name'] 		= $fbMe['name'];
				
				// GROUP
				$params	= JComponentHelper::getParams('com_users');
				$system	= $params->get('new_usertype', 2);
				$data['groups'] = array($system);
				
				// Bind the data.
				if (!$user->bind($data)) {
					$this->setError(JText::sprintf('COM_USERS_REGISTRATION_BIND_FAILED', $user->getError()));
					return false;
				}
		
				// Load the users plugin group.
				JPluginHelper::importPlugin('user');
		
				// Store the data.
				if (!$user->save()) {
					$this->setError(JText::sprintf('COM_USERS_REGISTRATION_SAVE_FAILED', $user->getError()));
					return false;
				}
				
				// CREATE PROFILE
				$profile = new stdClass();
				$profile->user_id		= $user->get('id');
				$profile->first_name 	= $user->get('name');
				$profile->email_alert 	= $user->get('email');
				
				$db->insertObject('#__rental_renters', $profile);
			}
			
			// LOGIN VIA FB API
			$app = JFactory::getApplication();
	
			// Get the log in credentials.
			$credentials = array();
			$credentials['username'] = $fbMe['email'];
			$credentials['password'] = $fbMe['email'];
			
			// Perform the log in.
			if (true === $app->login($credentials)) {
				// Success
				$this->setRedirect(JRoute::_('index.php?option=com_profile&view=profile', false));				
				return true;
			}
		}
		
		$this->setRedirect('index.php');
		return false;
	}

	/**
	 * Method to log in a user.
	 *
	 * @since	1.6
	 */
	public function signin()
	{
		$app = JFactory::getApplication();

		// Populate the data array:
		$data = array();
		$data['username'] = JRequest::getVar('email', '', 'method', 'username');
		$data['password'] = JRequest::getString('password', '', 'post', JREQUEST_ALLOWRAW);

		// Get the log in options.
		$options = array();
		$options['remember'] = JRequest::getBool('remember', false);

		// Get the log in credentials.
		$credentials = array();
		$credentials['username'] = $data['username'];
		$credentials['password'] = $data['password'];
		
		$json = array();
		$json['error'] = 1;
		$json['message'] = '';

		// Perform the log in.
		if (true === $app->login($credentials, $options)) {
			// Success
			$json['error'] 		= 0;
			$json['message'] 	= 'Chúc mừng bạn đăng nhập thành công';
			
			// set session user is broker or customer
			
			
			$this->setRedirect(JRoute::_('index.php?option=com_rental&view=profile', false));
		} else {
			// Login failed !
			$json['error'] = 1;
			$json['message'] = 'Email hoặc mật khẩu không đúng';
			$this->setRedirect(JRoute::_('index.php?option=com_rental&view=login', false));
		}
		return false;
	}
	
	/**
	 * Method to log out a user.
	 *
	 * @since	1.6
	 */
	public function signout()
	{
		//JSession::checkToken('request') or jexit(JText::_('JInvalid_Token'));

		$app = JFactory::getApplication();

		// Perform the log in.
		$error = $app->logout();

		// Check if the log out succeeded.
		if (!($error instanceof Exception)) {
			// Get the return url from the request and validate that it is internal.
			$return = JRequest::getVar('return', '', 'method', 'base64');
			$return = base64_decode($return);
			if (!JURI::isInternal($return)) {
				$return = '';
			}

			// Redirect the user.
			$app->redirect(JRoute::_($return, false));
		} else {
			$app->redirect(JRoute::_('index.php?option=com_profile&view=signin', false));
		}
	}
}