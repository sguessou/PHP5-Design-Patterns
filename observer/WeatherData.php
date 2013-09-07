<?php

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

	public registerObserver(IObserver $obs)
	{
		$this->observers[] = $obs;
	}

	public removeObserver(IObserver $obs)
	{

	}

	public getTemperature()
	{
		return $this->temperature;
	}

	public getHumidity()
	{
		return $this->humidity;
	}

	public getPressure()
	{
		return $this->pressure;
	}
}

?>