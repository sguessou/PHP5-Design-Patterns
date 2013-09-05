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
include_once('FormatHelper.php');



Class Client
{
	private $layout;
	private $movie;
	private $ebook;
	private $formatHelper;
	private $redis;
	private $lenght;
	private $movieClones;

	public function __construct()
	{
		$this->makeConPrototype();
		$this->redis = new Predis\Client();
		$this->cloneMovies();
	}

	private function makeConPrototype()
	{
		$this->movie = new Movie();
		$this->ebook = new Ebook();
	}

	private function cloneMovies()
	{
		//lenght of list containing movie id's
		$this->lenght = $this->redis->llen('movies_id');

		$movies_id= array();
		$movies_data = array();
		$this->movieClones = array();

		//We fetch the list of movie id's
		$movies_id = $this->redis->lrange('movies_id', 0, $this->lenght);

		//We fetch data related to each movie
		for ($i = 0; $i < $this->lenght; $i++)
			$movies_data[] = $this->redis->hgetall("movies:$movies_id[$i]");

		//We clone concrete class and insert data
		for ($i = 0; $i < $this->lenght; $i++)
		{
			$this->movieClones[$i] = clone $this->movie;
			$this->movieClones[$i]->setName( $movies_data[$i]['name'] );
			$this->movieClones[$i]->setDescription( $movies_data[$i]['description'] );
		}	

		//var_dump($movieClones);
	}

	
	public function displayMovies()
	{
		$this->formatHelper = new FormatHelper();
		$this->layout = $this->formatHelper->addTop();
		$this->layout .= '<div class="page-header"><h1>Prototype Example <small>movie product clones</small></h1></div>';
		
		$this->layout .= '<div class="col-lg-3"></div><div class="col-lg-9">';

		for ($i = 0; $i < $this->lenght; $i++)
		{
			$this->layout .= '<a href="#">' . $this->movieClones[$i]->getName() . '</a><br />';
		}

		$this->layout .= '</div>';

		$this->layout .= $this->formatHelper->closeUp();
		
		return $this->layout;
	} 

}


$product = new Client();

echo $product->displayMovies();


?>