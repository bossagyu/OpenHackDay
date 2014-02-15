<?php
/*
QAから取得したデータを話し言葉のように変換する。
*/

class Makeqa
{
    public    $result;
    protected $state;
    protected $pre_talk;
    protected $after_talk;

    public function __construct($data)
    {
        $this->state = $data;
    }
    
    public function low()
    {
        $this->pre_talk    = "...";
        $this->after_talk  = "。";
        $this->makeTalk();
    }

    public function normal()
    {
        $this->pre_talk    = "調べたら、";
        $this->after_talk  = "でした。";
        $this->makeTalk();
    }

    public function high()
    {
        $this->pre_talk    = "調べてみたら、";
        $this->after_talk  = "だったよ！";
        $this->makeTalk();
    }

    public function yami()
    {
        $this->pre_talk    = "ねぇ先輩。調べてみたらね、";
        $this->after_talk  = "だったよ！私、先輩の役にたったかな？先輩のためなら何でもするから、だからすてないで。。。先輩好き！先輩大好き。好き好きスキスキスキスキスキスキスキスキスキスキキスキスキスキスキスキキスキスキスキスキスキキスキスキスキスキスキキスキスキスキスキスキキスキスキスキスキスキ";
        $this->makeTalk();
    }
    
    public function makeTalk()
    {
        $this->result = $this->pre_talk.$this->state.$this->after_talk;
    }

}


?>
