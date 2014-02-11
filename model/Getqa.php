<?php
/*
    Q&Aのデータを取得する
*/
class Getqa
{
    protected $apikey;

    function __construct($key)
    {
        $this->apikey = $key;
    }

    // 知識QAからデータを取得
    function getRequest($data)
    {
        $url     = "https://api.apigw.smt.docomo.ne.jp/knowledgeQA/v1/ask";
        $req_url = $url."/?APIKEY=".$this->apikey."q=".$data;

        $ch     = curl_init();
        curl_setopt($ch, CURLOPT_URL, $req_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        var_dump(curl_exec($ch));
        curl_close;
    }

}

?>
