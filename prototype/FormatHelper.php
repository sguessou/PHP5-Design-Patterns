<?php

class FormatHelper
{
	private $topper;
	
	private $bottom;
	
	public function addTop()
	{
		$this->topper = "<!doctype html><html><head><link rel='stylesheet' type='text/css' href='../css/bootstrap.min.css'/><meta charset='UTF-8'>
		<title>Prototype method</title></head><body>";
		
		return $this->topper;
	}
	
	public function closeUp()
	{
		$this->bottom="</body></html>";
	
		return $this->bottom;
	}
}

?>

