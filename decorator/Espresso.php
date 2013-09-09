<?php

include_once('IBeverage.php');

class Espresso extends IBeverage
{
	public function __construct()
	{
		$this->description = 'Espresso';
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function cost()
	{
		return (float) 1.99;
	}
}

?>