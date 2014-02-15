<?php
/*
   配列形式で受け取ったデータをjson形式で返却するだけの簡単なお仕事
*/
class Returnjson
{
    protected $json_value;

    function __construct($data)
    {
        $json   = new Services_JSON;
        $this->json_value = $json->encode($data);
    }
    
    function returnResult()
    {
        //$header( 'Content-Type: text/javascript; charset=utf-8' );
        
        echo $this->json_value;
    }

}
