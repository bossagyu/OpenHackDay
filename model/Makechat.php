<?php
/*
    受け取ったデータを下に人間の会話っぽい感じにあげる 
*/

class Makechat
{
    
    protected $chat;
    protected $yomi;
    public    $result;

    function __construct($data)
    {
        $this->chat = $data;
    }

    public function setYomi($data)
    {
        $this->yomi = $data; 
    }
    
    public function tundere()
    {
        $multi  = preg_split("//u", $this->yomi, -1, PREG_SPLIT_NO_EMPTY);
        $this->result =  $multi[0]."、".$this->chat."///";
    }

}

?>
