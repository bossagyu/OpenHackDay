<?php

require_once "../lib/JSON.php";
require_once "curl_super2.php";


$url = "https://api.apigw.smt.docomo.ne.jp/dialogue/v1/dialogue";
$req_url = $url."?APIKEY=".'6846352e315975756533446f2f51566c5568723341387451654f452f5a7646684d47436442653051373636';


$data = array ('utt' => 'こんにちは');

$api = new Curlsuper($req_url);
$api->setData($data);
$api->getData();

var_dump($api->result);

?>
