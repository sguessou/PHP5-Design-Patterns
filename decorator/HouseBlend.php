<?php

include_once('IBeverage.php');

class HouseBlend extends IBeverage
{
	public function __construct()
	{
		$this->description = 'House Blend Coffee';
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function cost()
	{
		return (float) .89;
	}
}

?>