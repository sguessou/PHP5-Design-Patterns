<?php

include_once('IDisplay.php');
include_once('Observer.php');
include_once('WeatherData.php');

class StatisticsDisplay extends Observer implements IDisplay
{
	private $maxTemp = 0.0;
	private $minTemp = 200;
	private $tempSum = 0.0; 
	private $numReadings = 0;
	private $weatherData;

	public function __construct(ISubject $weatherData)
	{
		srand((double)microtime() * 1000000);
		$this->id = md5('observer' . time() . rand(1, 1000000));

		$weatherData->registerObserver($this);
		$this->weatherData = $weatherData;
	}

	public function getTemperature()
	{
		return $this->temperature;
	}

	public function getHumidity()
	{
		return $this->humidity;
	}

	public function update()
	{
		$this->tempSum += $this->weatherData->getTemperature();
		$this->numReadings++;

		if( $this->weatherData->getTemperature() > $this->maxTemp)
			$this->maxTemp = $this->weatherData->getTemperature();

		if( $this->weatherData->getTemperature() < $this->minTemp)
			$this->minTemp = $this->weatherData->getTemperature();
	


		$this->display();
	}

	public function display()
	{
		echo '<br />Avg/Max/Min Temperature = ' . (float)($this->tempSum / $this->numReadings). '/' . (float) $this->maxTemp . '/' . (float) $this->minTemp;
		//echo '<br /> id: ' . $this->id;
	}
}

?>