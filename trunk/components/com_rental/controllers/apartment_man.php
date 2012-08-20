<?php

class RentalControllerApartment_man extends JController
{
	function save()
	{
		$post = JRequest::get('post');
		
		$data = $post['jform'];
		
		$model = $this->getModel();
		$result = $model->save($data);
		
		$link = '';
		$msg = '';
		$type = '';
		
		if ($result)
		{
			$link = JRoute::_('index.php?option=com_deal&view=apartments_man');			
			$msg = 'Save Success !';
			$type = 'message';
		}
		else
		{
			$link = JRoute::_('index.php?option=com_deal&view=apartment_man&id=' . $post['id']);			
			$msg = 'Save Failed !';
			$type = 'warning';
		}		
		
		$this->setRedirect($link, $msg, $type);
		return true;
	}
}