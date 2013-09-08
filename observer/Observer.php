<?php

abstract class Observer
{
	private $id;

	public function getId()
	{
		return $this->id;
	}

	abstract function update();
}

?>