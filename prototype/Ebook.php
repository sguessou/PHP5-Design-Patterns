<?php

include_once('IPrototype.php');


Class Ebook extends IPrototype
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