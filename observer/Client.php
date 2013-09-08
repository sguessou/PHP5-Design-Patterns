<?php

function __autoload($class_name)
{
	include $class_name.'.php';
} 

error_reporting(E_ALL);
ini_set('display_errors', '1');


class Client
{
	public $weatherData;

	public function __construct()
	{
		$this->weatherData = new WeatherData();
		$display_1 = new CurrentConditionsDisplay($this->weatherData);
		$display_2 = new ForecastDisplay($this->weatherData);
		$display_3 = new StatisticsDisplay($this->weatherData);
		$display_4 = new HeatIndexDisplay($this->weatherData);
	}

}

$client = new Client();

$client->weatherData->setMeasurements(80, 64, 30.4);
$client->weatherData->setMeasurements(82, 70, 29.2);
$client->weatherData->setMeasurements(78, 90, 29.2);