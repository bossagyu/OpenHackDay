<?php
require "../lib/JSON.php";

$json = new Services_JSON;

$apiKey = "6846352e315975756533446f2f51566c5568723341387451654f452f5a7646684d47436442653051373636";
$url    = "https://api.apigw.smt.docomo.ne.jp/dialogue/v1/dialogue";
$reqUrl= $url."?APIKEY=".$apiKey;
$headers = ['Content-type: application/json; charset=UTF-8'];

$data = array("utt" => "アタック");
$context = $json->encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $reqUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $context);
//curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt ($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
var_dump(curl_exec($ch));
curl_close($ch);

?>
