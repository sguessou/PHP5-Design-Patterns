<?php

//LaravelProduct.php
include_once('FormatHelper.php');
include_once('Product.php');

class CodeIgniterProduct implements Product
{
	private $mfgProduct;
	private $formatHelper;
	private $countryNow; 
	
	public function getProperties()
	{
		//Loads text writeup from external text file
		$this->countryNow = file_get_contents("codeigniter.txt");

		$this->formatHelper = new FormatHelper();
		
		$this->mfgProduct = $this->formatHelper->addTop();

		$this->mfgProduct .= "<img style='padding: 10px 10px 10px 0px' src='ci_logo_flame.jpg' class='pixRight' width='208' height='450'>";
		
		$this->mfgProduct .= "<header>CodeIgniter</header>";

		$this->mfgProduct .= "<p>$this->countryNow</p>";

		$this->mfgProduct .=$this->formatHelper->closeUp();

		return $this->mfgProduct;
	}
}

?>