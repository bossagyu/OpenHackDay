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

    public function yami1()
    {
        $this->pre_talk    = "ねぇ先輩。調べてみたら、";
        $this->after_talk  = "あの子より私の方が可愛いでしょ？私の方が綺麗でしょ？私の方が暖かいでしょ優しいでしょ貴方の隣にいられるしお話も出来るし抱き締めてあげられるしだってあの子もうただの肉の塊じゃない転がってるだけの肉の塊じゃない肉の塊より私の方が可愛いでしょ？";
        $this->makeTalk();
    }
    
    public function yami2()
    {
        $this->result = "何でそんな事聞くの？大丈夫！何も心配いらないよ？あの女に騙されていたんだよね？可哀そうに。でも私、君のそういうお人よしなところも好きなんだ♪だからね、大丈夫。私が君を守ってあげるよぉ。怖いものとか危ないもの全部全部全部ポイしてあげる♪だから、ね？わたしをみて";
    }
       
    public function wakaranai()
    {
        $this->result = "ふえぇ、メメ馬鹿だからわからないよぉ";
    }

    public function makeTalk()
    {
        $this->result = $this->pre_talk.$this->state.$this->after_talk;
    }

}


?>
