<?php

include_once('IAbstract.php');

class SouthRegion extends IAbstract
{
	//Must return decimal value
	protected function giveCost()
	{
		return 1771.30;
	}

	//Must return string value
	protected function giveCity()
	{
		return "HK Sininen";
	}
}
?>