<?php
//IProductPrototype.php


abstract class IProductPrototype
{

	protected $name;
	protected $description;
	protected $type
	
	abstract function setType();
	abstract function getType(); 	

	
	//Name
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	//Description
	public function setdescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	abstract function __clone();
}
?>
