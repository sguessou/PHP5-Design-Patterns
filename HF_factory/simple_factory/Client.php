<?php

function __autoload($class_name)
{
	include $class_name.'.php';
} 

error_reporting(E_ALL);
ini_set('display_errors', '1');


class Client {
	
	public $factory;
	public $store;


	public function __construct() {
		$this->factory = new SimplePizzaFactory();
		$this->store = new PizzaStore($this->factory);
	}
	
	/*
	$pizza = $store->orderPizza('cheese');
	echo 'We ordered a '.$pizza->getName().'<br />';

	$pizza = $store->orderPizza('pepperoni');
	echo 'We ordered a '.$pizza->getName().'<br />';
*/
}

$client = new Client();

$pizza = $client->store->orderPizza('cheese');
echo '<br />We ordered a '.$pizza->getName().'<br />'.$pizza->toString().'<br /><br />';

$pizza = $client->store->orderPizza('pepperoni');
echo '<br />We ordered a '.$pizza->getName().'<br />'.$pizza->toString();

?>

