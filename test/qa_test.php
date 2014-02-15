<?php

require_once "curl_super.php";

$url  = "http://192.168.3.8/hackday/Talk/qa";
$data = array ("question" => "人類初の宇宙飛行士は"); 

$api = new Curlsuper($url);
$api->setData($data);
$api->getData();

var_dump($api->result);

?>
