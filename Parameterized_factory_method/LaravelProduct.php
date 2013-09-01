<?php

//LaravelProduct.php
include_once('FormatHelper.php');
include_once('Product.php');

class LaravelProduct implements Product
{
	private $mfgProduct;
	private $formatHelper;
	
	public function getProperties()
	{
		//Begin heredoc formating
		$this->formatHelper = new FormatHelper();
		$this->mfgProduct = $this->formatHelper->addTop();
		$this->mfgProduct .= <<<EOD
				<img style='padding: 10px 10px 10px 0px' src='laravel-4.jpg' class="pixRight "width='600' height='304'>
				<header>Laravel 4 is in Town!</header>
				<p>Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.
Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.
Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.</p>
EOD;
		$this->mfgProduct .=$this->formatHelper->closeUp();

		return $this->mfgProduct;
	}
}

?>