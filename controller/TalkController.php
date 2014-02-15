<?php

class TalkController
{
    public function talk()
    {
        $APIKEY  = "514650556a66486c6e514e4e6d433545525a313951513073356b7a6f6144595230776c415a596b30577437";
        $talkapi = new Getchat($APIKEY);
        $talkapi->setData($_POST);
        $talkapi->getRequest();
    }

    public function qa()
    {
        $APIKEY  = "30384f3271356159544e514a7a433135504d42386a6c7237516b773777657a534e706a6c7061756e596536";
        $qaapi   = new Getqa($APIKEY);
        $qaapi->getRequest($_POST['question']);
    }
    
    public function test()
    {
        print "test";

    }
}

?>
