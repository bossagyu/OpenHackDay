<?php

require_once "curl_super.php";
require_once "../lib/JSON.php";

$url = "http://192.168.3.8/hackday/Talk/talk";

$data = array ('utt' => 'こんにちは',
              'mode' => 'dialog',
              'tun' => '1',
              'context' => ''
              );
$json = new Services_JSON;

while(1) {

    $api = new Curlsuper($url);
    $comment = fgets(STDIN);
    if($comment == "exit") {
        break;
    }
    $data['utt'] = $comment;
    $api->setData($data);
    $api->getData();
    $jresult = $json->decode($api->result);
    print "$jresult->answer\n";
    $data['context'] = $jresult->context;
}

?>
