<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

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

		//return var_dump($movies_data);

		//We clone concrete class and insert data
		
		for ($i = 0; $i < $this->lenght; $i++)
		{
			$this->movieClones[$i] = clone $this->movie;
			$this->movieClones[$i]->setName( $movies_data[$i]['name'] );
			$this->movieClones[$i]->setId( $movies_data[$i]['id'] );
			$this->movieClones[$i]->setDescription( $movies_data[$i]['description'] );
		}	

		//return var_dump($this->movieClones); 
	}

	
	public function displayMovies()
	{
		$this->formatHelper = new FormatHelper();
		$this->layout = $this->formatHelper->addTop();
		$this->layout .= '<div class="page-header"><h1>Prototype Example <small>movie product clones</small></h1></div>';
		
		$this->layout .= '<div class="col-lg-3"></div><div class="col-lg-9">';

		for ($i = 0; $i < $this->lenght; $i++)
		{
			$this->layout .= '<a data-toggle="modal" href="#myModal_'.$this->movieClones[$i]->getId().'" class="btn btn-link">'.$this->movieClones[$i]->getName().'</a><br />';

			$this->layout .= '
			<!-- Modal -->
			  <div class="modal fade" id="myModal_'.$this->movieClones[$i]->getId().'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title">'.$this->movieClones[$i]->getName().'</h4>
			        </div>
			        <div class="modal-body">
			        <h4>DVD Description</h4><br />
            		<div class="twist_img">
          			<img src="../images/'.$this->movieClones[$i]->getId().'.jpg">
			         <p>'.$this->movieClones[$i]->getDescription().'</p>
			         </div>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			         </div>
			      </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			  </div><!-- /.modal -->';
 				
		}

		$this->layout .= '</div>';

		$this->layout .= $this->formatHelper->closeUp();
		
		return $this->layout;
	} 

}


$product = new Client();

echo $product->displayMovies();


?>