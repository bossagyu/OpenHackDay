<?php
/*
   配列形式で受け取ったデータをjson形式で返却するだけの簡単なお仕事
*/
class Returnjson
{
    protected $json_value;

    function __construct($data)
    {
        $json_value = json_encode( sample_array );
    }
    
    function returnResult()
    {
        $header( 'Content-Type: text/javascript; charset=utf-8' );
        echo $this->jason_value;
    }


}


?>
