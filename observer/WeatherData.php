<?php

include_once('ISubject.php');
//include_once('Observer.php');


class WeatherData implements ISubject
{
	private $observers;
	private $temperature;
	private $humidity;
	private $pressure;

	public function __construct()
	{
		$this->observers = array();
	}

	public function registerObserver(Observer $obs)
	{
		$this->observers[] = $obs;
		//var_dump($this->observers);
	}

	public function removeObserver(Observer $obs)
	{
		return;
	}

	public function notifyObserver()
	{
		for ($i = 0; $i < sizeof($this->observers); $i++)
			$this->observers[$i]->update();	
	}

	public function measurementsChanged()
	{
		$this->notifyObserver();
	}

	public function setMeasurements($temperature, $humidity, $pressure)
	{
		$this->temperature = (float) $temperature;
		$this->humidity = (float) $humidity;
		$this->pressure = (float) $pressure;

		$this->measurementsChanged();
	}

	public function getTemperature()
	{
		return $this->temperature;
	}

	public function getHumidity()
	{
		return $this->humidity;
	}

	public function getPressure()
	{
		return $this->pressure;
	}
}

?>