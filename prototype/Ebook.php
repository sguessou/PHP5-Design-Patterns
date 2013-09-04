<?php

include_once('IPrototype.php');


Class Ebook extends IPrototype
{
	public function setType()
	{
		$this->type = 'Ebook';
	}

	public function getType()
	{
		return $this->type;
	}

	function __clone(){}
} 

?>