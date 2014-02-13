<?php

class TalkController
{
    public function talk()
    {
    $APIKEY = "30384f3271356159544e514a7a433135504d42386a6c7237516b773777657a534e706a6c7061756e596536";
        $talkapi = new Getchat($APIKEY);
        $talkapi->setData($_POST);
        $talkapi->getRequest();
    }

    public function qnada()
    {
        print "ananda";
    }
    
    public function test()
    {
        print "test";

    }
}

?>
