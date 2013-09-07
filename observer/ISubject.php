<?php

interface ISubject 
{
	//Both of these methods take an observer as an argument.
	public registerObserver(IObserver $obs);
	public removeObserver(IObserver $obs);

	//This method is called to notify all observers when the subject's state
	//has changed.
	public notifyObserver();
}

?>