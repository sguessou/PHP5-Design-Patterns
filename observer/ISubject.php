<?php

include_once('IObserver.php');

interface ISubject 
{
	//Both of these methods take an observer as an argument.
	public function registerObserver(IObserver $obs);
	public function removeObserver(IObserver $obs);

	//This method is called to notify all observers when the subject's state
	//has changed.
	public function notifyObserver();
}

?>