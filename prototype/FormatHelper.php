<?php

class FormatHelper
{
	private $topper;
	
	private $bottom;
	
	public function addTop()
	{
		$this->topper = "<!doctype html><html>
						 <head>
						 <link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'/>
						 <link rel='stylesheet' type='text/css' href='../css/modal_img.css'/>
						 <meta charset='UTF-8'>
						 <title>Prototype method</title>
						 </head><body>";
		
		return $this->topper;
	}
	
	public function closeUp()
	{
		$this->bottom = '<script src="../js/jquery-1.10.2.min.js"></script>';
		$this->bottom .= '<script src="../js/bootstrap.min.js"></script>';
		$this->bottom .= '</body></html>';
	
		return $this->bottom;
	}
}

?>

