<?php

class TalkController
{
    public function talk()
    {
        $APIKEY  = "xxxxx";
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
        $APIKEY  = "xxxxxx";
        $qaapi    = new Getqa($APIKEY);
        $qaapi->getRequest($_POST['question']);
        $json     = new Services_JSON;
        $content  = $json->decode($qaapi->response);
        $makeqa   = new Makeqa($content->answers[0]->answerText);
        if(isset($content->answers[0]->answerText)){
            $makeqa->$_POST['value']();
        }
        else {
            $makeqa->wakaranai();
        }
        $jresult['answer'] = $makeqa->result;
        $jreturn = new Returnjson($jresult);
        $jreturn->returnResult();
    }
    public function recspot()
    {
        $reco       = new Recomendspot();
        $result_tmp = $reco->getSpot(5);
        $recome     = new Makerecomend($result_tmp[3]['title']);
        if($_POST['yan'] == 1) {
            $recome->yanTalk();
        }
        else {
            $recome->makeTalk();
        }
        $result['answer'] = $recome->result;
        $result['url']  = $result_tmp[3]['url'];
        $jreturn  = new Returnjson($result);
        $jreturn->returnResult();
    }

    public function test()
    {
        print "test";
        
    }

}

?>
