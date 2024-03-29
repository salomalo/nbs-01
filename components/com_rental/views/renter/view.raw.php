<?php
/**
 * version $Id: view.html.php $
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * HTML View class for the Content component
 *
 * @package		Joomla.Site
 * @subpackage	com_content
 * @since 1.5
 */

class RentalViewRenter extends JView
{
	protected $items;
	protected $pagination;
	protected $checkErrors;
	protected $checkEmailAddress = '';
	protected $neighborhood;

	function display($tpl = null)
	{

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->_prepareDocument();
		
		// Get the document object.
		$document =& JFactory::getDocument();
		
		// Set the MIME type for JSON output.
		$document->setMimeEncoding('text/javascript');
		
		// Change the suggested filename.
		//JResponse::setHeader('Content-Disposition','attachment;filename="'.$view->getName().'.json"');
		//JResponse::setHeader('');
		header('Content-Type: text/javascript; charset=' . $document->getCharset());
		
		//var_dump();
		
		$post = JRequest::get('post');
		
		$user = $post['user'];
		
		$errors = array();
		$this->checkErrors = array();
		
		//check valid
		if ($user['first_name'] == '')
			$errors[] = 'First name can\'t be blank';
		
		if ($user['last_name'] == '')
			$errors[] = 'Last name can\'t be blank';
		
		if ($user['email'] == '')
			$errors[] = 'Email can\'t be blank';
		
		if (!$this->checkValidEmail($user['email']))
		{
			$this->checkEmailAddress = 'INVALID';
			$errors[] = 'Email should look like an email address';
		}
		
		$model = $this->getModel();
		
		$checkEmailExist = $model->checkEmailExist($user['email']);
		
		if ($checkEmailExist)
		{
			$this->checkEmailAddress = 'TAKEN';
			$errors[] = 'Email has already been taken';
		}
		
		if ($user['phone_number'] == '')
			$errors[] = 'Phone number can\'t be blank';
		
		if (strlen($user['phone_number']) != 10)
			$errors[] = 'Phone number is the wrong length (should be 10 characters)';
		
		if (strlen($user['password']) < 4)
		{
			$errors[] = 'Password is too short (minimum is 4 characters)';
		}
		
		$current_step = 1;
		
		if (!empty($errors))
		{
			$this->checkErrors = $errors;
		}
		else
			$current_step = $post['step'];
		
		//get neighborhood
		$this->neighborhood = $model->getNeighborhood();
		
		$renter = $post['renter'];
		
		//check if step 2 has errors
		if ($current_step == 3)
		{
			if (!isset($renter['apartment_size_ids']))
				$errors[] = 'Please choose at least one apartment size';
			
			if (!isset($renter['neighborhood_ids']))
				$errors[] = 'Please choose at least one neighborhood';
			
			if (!empty($errors))
			{
				$current_step = 2;
				$this->checkErrors = $errors;
			}
		}
		
		// check last step
		if ($current_step == 4)
		{
			if (intval($renter['maximum_rent']) <= 0)
				$errors[] = 'Maximum rent can\'t be blank or is not a number';
			
			if ($renter['move_date'] == '')
				$errors[] = 'Est. Move Date can\'t be blank';
			else
			{
				//convert move_date
				$tmp = explode('/', $renter['move_date']);
				$tmp = $tmp[2] . '-' . $tmp[0] . '-' . $tmp[1];					
					
				if (strtotime($tmp) < strtotime(date('Y-m-d')))
					$errors[] = 'Est. Move Date must be in the future';
			}
			
			//var_dump(strtotime($tmp), strtotime(date('Y-m-d')), (strtotime($tmp) < strtotime(date('Y-m-d'))));
			
			if (!isset($renter['have_pet']))
				$errors[] = 'Do you have a pet? can\'t be blank';
			
			if (!isset($renter['roommates_total']))
				$errors[] = 'How many roommates are you looking with? can\'t be blank';
			
			if (!empty($errors))
			{
				$current_step = 3;
				$this->checkErrors = $errors;
			}
			else
			{
				//build data for user
				
				//reg user
				$result = $model->register($user, $renter);
				
				//if reg done
				if ($result === true)
				{
					//set session new user
					$session = JFactory::getSession();
					$session->set('SESSION_NEW_USER', 1);
					
					//login with email & password user provided when reg
					
				}
				
				
			}
		}
		
		$contents = null;
		
		//get default form
		ob_start();
		echo parent::display($tpl);
		$contents = ob_get_contents();
		ob_end_clean();
		
		switch ($current_step) {
			case 1: //step1 
				$contents = $this->loadTemplate('step1');
				$contents = str_replace('/', '\/', preg_replace('/[\r\n]+/', null, $contents));
				$contents = str_replace('"', '\"', $contents);
				$contents = str_replace("'", "\'", $contents);
				$contents = "$('#new_renter').replaceWith('".$contents."');";
			break;
			case 2:
				$contents = $this->loadTemplate('step2');
			break;
			case 3:
				$contents = $this->loadTemplate('step3');
			break;
			case 4://check form and save data
				//forward user to page list apartment
				$contents = $this->loadTemplate('step4');
			break;
		}
		
		echo $contents;
		jexit();

		//parent::display($tpl);
	}
	
	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		//TODO: prepare document
	}
	
	function checkValidEmail($email = '')
	{
		return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
	}
}
