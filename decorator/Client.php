<?php

function __autoload($class_name)
{
	include $class_name.'.php';
} 

error_reporting(E_ALL);
ini_set('display_errors', '1');


class Client
{
	public $beverage;
	public $beverage_2;
	public $beverage_3; 

	public function __construct()
	{
		$this->beverage = new Espresso();
		
		$this->beverage_2 = new DarkRoast();
		$this->beverage_2 = new Mocha($this->beverage_2);
		$this->beverage_2 = new Mocha($this->beverage_2);
		$this->beverage_2 = new Whip($this->beverage_2);
		
		$this->beverage_3 = new HouseBlend();
		$this->beverage_3 = new Soy($this->beverage_3);
		$this->beverage_3 = new Mocha($this->beverage_3);
		$this->beverage_3 = new Whip($this->beverage_3);
	}
}

$client = new Client();

echo $client->beverage->getDescription().' $'.$client->beverage->cost(); 
echo '<br />'.$client->beverage_2->getDescription().' $'.$client->beverage_2->cost();
echo '<br />'.$client->beverage_3->getDescription().' $'.$client->beverage_3->cost(); 

?>
