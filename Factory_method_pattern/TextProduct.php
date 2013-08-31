<?php

//TextProduct.php
include_once('Product.php');

class TextProduct implements Product
{
	private $mfgProduct;
	
	public function getProperties()
	{
		//Begin heredoc formating
		$this->mfgProduct =  $msg = <<<EOD
				<html>
				<body>
				<h2>Thank you for registering!</h2>
				<div>The final step is to confirm 
				your account by clicking on:</div>
				<div><confirm_url/></div>
				<div>
				<b>OnlineStore Team</b>
				</div>
				</body>
				</html>
EOD;

		return $this->mfgProduct;
	}
}

?>
