<?php

require_once "curl_super.php";

$url = "http://192.168.3.8/hackday/Talk/talk";

$data = array ('utt' => 'こんにちは',
              'mode' => 'dialog',
              'context' => ''
              );

$api = new Curlsuper($url);
$api->setData($data);
$api->getData();

var_dump($api->result);

?>
