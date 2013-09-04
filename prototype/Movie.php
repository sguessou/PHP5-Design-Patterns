<?php

include_once('IPrototype.php');


Class Movie extends IPrototype
{
	public function setType()
	{
		$this->type = 'Movie';
	}

	public function getType()
	{
		return $this->type;
	}

	function __clone(){}
} 

?>