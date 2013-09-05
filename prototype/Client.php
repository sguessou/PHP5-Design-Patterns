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
	private $movie = array();
	private $ebook = array();
	private $redis;

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
		$var = $this->redis->llen('movies_id');

		$movies_id= array();
		$movies_data = array();
		$movieClones = array();

		//We fetch the list of movie id's
		$movies_id = $this->redis->lrange('movies_id', 0, $var);

		//We fetch data related to each movie
		for ($i = 0; $i < $var; $i++)
			$movies_data[] = $this->redis->hgetall("movies:$movies_id[$i]");

		//We clone concrete class and insert data
		for ($i = 0; $i < $var; $i++)
		{
			$movieClones[$i] = clone $this->movie;
			$movieClones[$i]->setName( $movies_data[$i]['name'] );
			$movieClones[$i]->setDescription( $movies_data[$i]['description'] );
		}	


		for ($i = 0; $i < $var; $i++)
		{
			echo '<strong>'.$movieClones[$i]->getName().'</strong><br />';
			echo '<p>'.$movieClones[$i]->getDescription().'</p><br /><br />';

		}
			



	}

}


$product = new Client();

?>