<?php
/*
    受け取ったデータを下に人間の会話っぽい感じにあげる 
*/

class Makerecomend
{
    
    protected $spot;
    protected $url;
    public    $result;

    function __construct($spot)
    {   
        $this->spot = $spot;
    }   

    public function makeTalk()
    {   
        $this->result = "ねぇ、今度一緒に".$this->spot."に行こうよ!"; 
    }
    
    public function yanTalk()
    {
        $this->result = "ねぇ、先輩。".$this->spot."に行きたいんでしょ？私知ってるんだよ。先輩のTwitterずっと監視してますからね。ふふふ。";
    }

}

?>
