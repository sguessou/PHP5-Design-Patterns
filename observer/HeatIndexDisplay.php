<?php

include_once('IDisplay.php');
include_once('Observer.php');
include_once('WeatherData.php');

class HeatIndexDisplay extends Observer implements IDisplay
{
	private $heatIndex = 0.0;
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
		$this->heatIndex = $this->computeHeatIndex($this->weatherData->getTemperature(), $this->weatherData->getHumidity());
		$this->display();
	}

	private function computeHeatIndex($t, $rh)
	{
		$index = (float)((16.923 + (0.185212 * $t) + (5.37941 * $rh) - (0.100254 * $t * $rh) 
			+ (0.00941695 * ($t * $t)) + (0.00728898 * ($rh * $rh)) 
			+ (0.000345372 * ($t * $t * $rh)) - (0.000814971 * ($t * $rh * $rh)) +
			(0.0000102102 * ($t * $t * $rh * $rh)) - (0.000038646 * ($t * $t * $t)) + (0.0000291583 * 
			($rh * $rh * $rh)) + (0.00000142721 * ($t * $t * $t * $rh)) + 
			(0.000000197483 * ($t * $rh * $rh * $rh)) - (0.0000000218429 * ($t * $t * $t * $rh * $rh)) +
			0.000000000843296 * ($t * $t * $rh * $rh * $rh)) -
			(0.0000000000481975 * ($t * $t * $t * $rh * $rh * $rh)));

		return $index;
	}

	public function display()
	{
		echo '<br />Heat index is: ' . (float) $this->heatIndex . '<br />';
		//echo '<br /> id: ' . $this->id;
	}
}

?>