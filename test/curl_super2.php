<?php

class Curlsuper 
{
    protected $curl;
    protected $url;
    public $result;

    public function __construct($tmp_url)
    {
        $this->url = $tmp_url;
        $this->iniCurl();
    }
    
    public function iniCurl ()
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, $this->url);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
    }
    public function setData($data)
    {
        $header =  ['Content-type: application/json; charset=UTF-8'];
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt ($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        $json = new Services_JSON;
        $test1 = $json->encode($data);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $test1);
    }

    public function getData (){
        $this->result = curl_exec($this->curl);
        curl_close($this->curl);
    }
}

?>
