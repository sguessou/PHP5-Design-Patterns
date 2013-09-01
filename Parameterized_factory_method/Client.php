<?php

//Client.php
include_once('CountryFactory.php');
include_once('LaravelProduct.php');

class Client
{
	private $countryFactory;
	
	public function __construct()
	{
		$this->countryFactory = new CountryFactory();
		
		echo $this->countryFactory->startFactory(new LaravelProduct());	
	}
}

$worker = new Client();

?>
