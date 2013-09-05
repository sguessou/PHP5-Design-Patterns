<?php

//IPrototype.php
abstract class IPrototype
{

	protected $name;
	protected $description;
	protected $type;
	protected $id;
	
	abstract function setType($type);
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
	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	//Id
	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	abstract function __clone();
}

?>
