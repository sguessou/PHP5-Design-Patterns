<?php

include_once('IBeverage.php');

class DarkRoast extends IBeverage
{
	public function __construct()
	{
		$this->description = 'Dark Roast Coffee';
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function cost()
	{
		return (float) .99;
	}
}

?>