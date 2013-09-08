<?php

include_once('Observer.php');

interface ISubject 
{
	//Both of these methods take an observer as an argument.
	public function registerObserver(Observer $obs);
	public function removeObserver(Observer $obs);

	//This method is called to notify all observers when the subject's state
	//has changed.
	public function notifyObserver();
}

?>