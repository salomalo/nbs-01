<?php

class RentalControllerApartment_man extends JController
{
	function save()
	{
		$post = JRequest::get('post');
		
		$data = $post['jform'];
		
		$model = $this->getModel('Apartment_man', 'RentalModel');
		$result = $model->save($data);
		
		$link = '';
		$msg = '';
		$type = '';
		
		if ($result)
		{
			$link = JRoute::_('index.php?option=com_rental&view=apartments_man', false);			
			$msg = 'Save Success !';
			$type = 'message';
		}
		else
		{
			$link = JRoute::_('index.php?option=com_rental&view=apartment_man&id=' . $data['id'], false);			
			$msg = 'Save Failed !';
			$type = 'warning';
		}		
		
		$this->setRedirect($link, $msg, $type);
		return true;
	}
}