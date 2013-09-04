<?php

require '../vendor/autoload.php';

/*
function __autoload($class_name)
{
	include $class_name.'.php';
} 
*/

include_once('Movie.php');
include_once('Ebook.php');



Class Client
{
	private $movie;
	private $ebook;
	private $redis;

	public function __construct()
	{
		$this->makeConPrototype();
		$this->redis = new Predis\Client();
		$this->initProductId();
	}

	private function makeConPrototype()
	{
		$this->movie = new Movie();
		$this->ebook = new Ebook();
	}

	private function initProductId()
	{
		echo $this->redis->llen('movies_id');
	}

}


$product = new Client();

?>