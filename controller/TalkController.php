<?php

class TalkController
{
    public function talk()
    {
        $APIKEY  = "514650556a66486c6e514e4e6d433545525a313951513073356b7a6f6144595230776c415a596b30577437";
        $talkapi = new Getchat($APIKEY);
        $talkapi->setData($_POST);
        $talkapi->getRequest();
        $json    = new Services_JSON;
        $content = $json->decode($talkapi->response);
        //ツンデレ化
        $answer = $content->utt;
        if($_POST['tun'] == 1) {
            $tundere = new Makechat($answer);
            $tundere->setYomi($content->yomi);
            $tundere->tundere();
            $answer  = $tundere->result;
        }
        $jresult['answer']  = $answer;
        $jresult['context'] = $content->context;
        $jresult['mode']    = $content->mode;
        $jreturn = new Returnjson($jresult);
        $jreturn->returnResult();
    }

    public function qa()
    {
        $APIKEY  = "30384f3271356159544e514a7a433135504d42386a6c7237516b773777657a534e706a6c7061756e596536";
        $qaapi    = new Getqa($APIKEY);
        $qaapi->getRequest($_POST['question']);
        $json     = new Services_JSON;
        $content  = $json->decode($qaapi->response);
        $makeqa   = new Makeqa($content->answers[0]->answerText);
        $makeqa->$_POST['value']();
        $jresult['answer'] = $makeqa->result;
        $jreturn = new Returnjson($jresult);
        $jreturn->returnResult();
    }
    
    public function test()
    {
        print "test";

    }

}

?>
