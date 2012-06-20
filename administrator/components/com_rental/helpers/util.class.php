<?php

//require thumb lib
require_once 'phpthumb/ThumbLib.inc.php';

class JEUtil 
{
	function getRandomString($length = 7) 
	{
	    $validCharacters = "abcdefghijkmnpqrstuxyvwzABCDEFGHIJKLMNPQRSTUXYVWZ23456789";
	    $validCharNumber = strlen($validCharacters);
	 
	    $result = "";
	 
	    for ($i = 0; $i < $length; $i++) 
	    {
	        $index = mt_rand(0, $validCharNumber - 1);
	        $result .= $validCharacters[$index];
	    }
	 
	    return $result;
	}
	
	public function resizeImage($file, $thumbFile, $thumbW = null, $thumbH = null, $crop = true)
	{ 
		if(!$thumbW) $thumbW = 220;
		if(!$thumbH) $thumbH = 60;
		
		if(!file_exists( $thumbFile ) && is_file($file))
		{
			//make thumb
			$thumb =  PhpThumbFactory::create($file);
			$thumb -> resize($thumbW);
			
			if($crop)
				$thumb->crop(0, 0, $thumbW, $thumbH);
				
			$thumb -> save($thumbFile);
		}
	}
	
	function is_serialized($data)
	{ 
	    if (trim($data) == "") 
	        return false;
	    
	    if (preg_match("/^(i|s|a|o|d)(.*);/si",$data))
	        return true;
	    
	    return false; 
	}
	
	function thumb($images, $pathUpload, $pathThumb, $thumbW, $thumbH = null, $crop = true)
	{
		//get array of image
		$images = unserialize($images);
		$thumbFile = array();
		
		$path = '';
		
		foreach ($images as $img)
		{
			$newPathThumb = null;
			//explode image by path seperate
			$tmp = explode('/', $img);
			
			//remove last element in array
			$imgFile = array_pop($tmp);

			//re-build path
			$path = implode('/', $tmp);
			
			$newPathThumb = $pathThumb . $path;
			
			$thumbFile[] = $path . '/thumbnail-' . $imgFile;
			
			//make dir if not exist
			if(!is_dir($newPathThumb))
				mkdir($newPathThumb, 0777, true);
			
			$createThumbFile = $newPathThumb . '/thumbnail-' . $imgFile;
			
			//make thumb
			$file = $pathUpload . $img;
						
			if(!file_exists( $createThumbFile ) && is_file($file))
			{
				$thumb =  PhpThumbFactory::create($file);
				$thumb -> resize($thumbW);
				
				if($crop)
				{
					$thumb->crop(0, 0, $thumbW, $thumbH);
				}
					
				$thumb -> save($createThumbFile);
			}
			
			
		}
		
		return $thumbFile;
	}
	
	function getBedrooms()
	{
		$arr = array( 
						1 => 'Studio', 
						2 => 'Loft',
						3 => '1br',
						4 => '2br',
						5 => '3br',
						6 => '4br',
						7 => '5br',
						8 => '6br',
						9 => '7br',
						10 => '8br',
				);
		
		return $arr;
	}
	
	function getCreditScore()
	{
		$creditScore = array (
				'800' => array('Excellent'	, '(800+)'),
				'799' => array('Very Good'	, '(700-799)'),
				'699' => array('Good'		, '(680-699)'),
				'679' => array('OK/Fair'	, '(620-679)'),
				'619' => array('Poor'		, '(580-619)'),
				'579' => array('Bad'		, '(500-579)'),
				'9003' => array('Not sure'	, '???'),
					
		);
		
		return $creditScore;
	}
	
	function getPetAllow()
	{
		$arr = array(
						1 => 'Not Allowed',
						2 => 'Pets Allow',
						3 => 'Dogs',
						4 => 'Cats',
						5 => 'Small Dogs',
						6 => 'Small Cats'
				);
		
		return $arr;
	}
}