<?php

include_once('ICondimentDecorator.php');
include_once('IBeverage.php');

class Mocha extends ICondimentDecorator
{
	public function __construct(IBeverage $beverage)
	{
		$this->beverage = $beverage;
	}

	public function getDescription()
	{
		return 	$this->beverage->getDescription().', Mocha';
	}

	public function cost()
	{
		return (float) .20 + $this->beverage->cost();
	}
	
}

?>