<?php

include_once('IPrototype.php');


Class Movie extends IPrototype
{
	public function setType($type)
	{
		$this->type = $type;
	}

	public function getType()
	{
		return $this->type;
	}

	function __clone(){}
} 

?>