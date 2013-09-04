<?php

include_once('IProductProtype.php'); 

Class Movies extends IProductPrototype
{
	public function setType()
	{
		$this->type = 'Movie';
	}

	public function getType()
	{
		return $this->type;
	}

	public function __clone() {}
} 