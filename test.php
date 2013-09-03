<?php
// prepend a base path if Predis is not present in your "include_path".

require 'vendor/autoload.php';

//require 'Predis/Autoloader.php';

//Predis\Autoloader::register();

//require 'vendor/autoload.php';

$redis = new Predis\Client();


$redis->set('foo', 'bar');
$value = $redis->get('foo');


echo $value;

?>