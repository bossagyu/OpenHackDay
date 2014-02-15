<?php
/*
	オブジェクト生成時にAPIキーを渡す
	雑談APIを利用する
*/
class Getchat
{
	protected $apikey;
    protected $datas;
    public    $response;

    // 決め打ちのデフォルトの設定
	function __construct($key)
	{
		$this->apikey = $key;
        $this->datas  = array("nickname" => "先輩",
                    "nickname_y" => "センパイ",
                    "sex" => "男",
                    "bloodtype" => "O",
                    "birthdateY" => "1997",
                    "birthdateM" => "1",
                    "birthdateD" => "15",
                    "age" => "17",
                    "constellations" => "やぎ座",
                    "plaece" => "東京"
               );
	}
    
    // APIにリクエストを投げる
	public function getRequest()
	{
        $url    = "https://api.apigw.smt.docomo.ne.jp/dialogue/v1/dialogue";
        $req_url= $url."?APIKEY=".$this->apikey;
        $json   = new Services_JSON;

        $ch     = curl_init();
        $content= $json->encode($this->datas);
        $header = ['Content-type: application/json; charset=UTF-8'];
        curl_setopt($ch, CURLOPT_URL, $req_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $this->response = curl_exec($ch);
        curl_close($ch);
	}
    
    // フロント側から送られてきたデータの設定
    public function setData($post_data)
    {
        $this->datas['utt']      = $post_data['utt'];
        $this->datas['mode']     = $post_data['mode'];
        $this->datas['context']  = $post_data['context'];
    }
}
?>
