<?php

include_once('IDisplay.php');
include_once('Observer.php');
include_once('WeatherData.php');

class CurrentConditionsDisplay extends Observer implements IDisplay
{
	private $temperature;
	private $humidity;
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
		$this->temperature = $this->weatherData->getTemperature();
		$this->humidity = $this->weatherData->getHumidity();

		$this->display();
	}

	public function display()
	{
		echo '<br />Current conditions: ' . $this->getTemperature() . 'F degrees and ' . $this->getHumidity() . ' % humidity';
		//echo '<br /> id: ' . $this->id;
	}
}

?>