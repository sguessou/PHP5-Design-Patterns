<?php

include_once('IAbstract.php');

class EastRegion extends IAbstract
{
	//Must return decimal value
	protected function giveCost()
	{
		return 3897;
	}

	//Must return string value
	protected function giveCity()
	{
		return "Pyttipannu";
	}
}
?>