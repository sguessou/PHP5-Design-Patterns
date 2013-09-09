<?php

abstract class IBeverage
{
	protected $description;

	abstract function getDescription();
		
	abstract function cost();
}

?>