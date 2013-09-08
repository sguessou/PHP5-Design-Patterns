<?php

include_once('IDisplay.php');
include_once('Observer.php');
include_once('WeatherData.php');

class ForecastDisplay extends Observer implements IDisplay
{
	private $currentPressure = 29.92;
	private $lastPressure;
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
		$this->lastPressure = $this->currentPressure;
		$this->currentPressure = $this->weatherData->getPressure();

		$this->display();
	}

	public function display()
	{
		echo '<br />Forecast: ';
		if ($this->currentPressure > $this->lastPressure)
			echo 'Improving weather on the way!';
		elseif ($this->currentPressure == $this->lastPressure)
			echo 'More of the same';
		elseif ($this->currentPressure < $this->lastPressure)
			echo 'Watch out for cooler, rainy weather';

		//echo '<br /> id: ' . $this->id;
	}
}

?>