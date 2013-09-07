<?php

function __autoload($class_name)
{
	include $class_name.'.php';
} 

error_reporting(E_ALL);
ini_set('display_errors', '1');



//include_once('WeatherData.php');
//include_once('CurrentConditionsDisplay.php');
//include_once('ForecastDisplay.php');

class Client
{
	public $weatherData;

	public function __construct()
	{
		$this->weatherData = new WeatherData();
		$display_1 = new CurrentConditionsDisplay($this->weatherData);
		$display_2 = new ForecastDisplay($this->weatherData);
		$display_3 = new StatisticsDisplay($this->weatherData);
	}

}

$client = new Client();
$client->weatherData->setMeasurements(80, 64, 30.4);