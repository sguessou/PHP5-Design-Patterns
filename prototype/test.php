<?php

require '../vendor/autoload.php';

$redis = new Predis\Client();


$redis->set('foo', 'bar');
$value = $redis->get('foo');


echo $value;

?>