<?php
/*
    Q&Aのデータを取得する
*/
class Getqa
{
    protected $apikey;
    public    $response;

    function __construct($key)
    {
        $this->apikey = $key;
    }

    // 知識QAからデータを取得
    function getRequest($data)
    {
        $url     = "https://api.apigw.smt.docomo.ne.jp/knowledgeQA/v1/ask";
        $req_url = $url."?APIKEY=".$this->apikey."&q=". urlencode($data);
        $headers = ['Content-type: charset=UTF-8'];
        $ch     = curl_init();
        curl_setopt($ch, CURLOPT_URL, $req_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $this->response = curl_exec($ch);
        curl_close($ch);
    }

}

?>
