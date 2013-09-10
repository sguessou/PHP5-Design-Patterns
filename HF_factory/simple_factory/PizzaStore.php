<?php

include_once('SimplePizzaFactory.php');

class PizzaStore {
	protected $factory;

	public function __construct(SimplePizzaFactory $factory) {
		$this->factory = $factory;
	}

	public function orderPizza($type) {
		$pizza = $this->factory->createPizza($type);

		$pizza->prepare();
		$pizza->bake();
		$pizza->cut();
		$pizza->box();

		return $pizza;
	}

}


?>

