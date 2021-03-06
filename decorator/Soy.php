<?php

include_once('ICondimentDecorator.php');
include_once('IBeverage.php');

class Soy extends ICondimentDecorator
{
	public function __construct(IBeverage $beverage)
	{
		$this->beverage = $beverage;
	}

	public function getDescription()
	{
		return 	$this->beverage->getDescription().', Soy';
	}

	public function cost()
	{
		return (float) .15 + $this->beverage->cost();
	}
	
}

?>