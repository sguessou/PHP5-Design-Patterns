<?php

include_once('Pizza.php');

class SimplePizzaFactory
{
	private $pizza;

	public function createPizza($str)
	{
		if ($str == 'cheese') {
			$this->pizza = new CheesePizza();
		}elseif ($str == 'pepperoni') {
			$this->pizza = new PepperoniPizza();
		}elseif ($str == 'clam') {
			$this->pizza = new ClamPizza();
		}elseif ($str == 'veggie') {
			$this->pizza = new VeggiePizza();
		}

		return $this->pizza;
	}
}

?>