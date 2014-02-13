<?php
/*
	オブジェクト生成時にAPIキーを渡す
	雑談APIを利用する
*/
class Getchat
{
	protected $apikey;
    protected $data;

    // 決め打ちのデフォルトの設定
	function __construct($key)
	{
		$this->apikey = $key;
        $this->data = array("nickname" => "先輩",
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
	function getRequest()
	{
        $url    = "https://api.apiw.smt.docomo.ne.jp/dialogue/v1/dialogue";
        $req_url= $url."?APIKEY=".$this->apikey;
        
        $ch     = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        var_dump(curl_exec($ch));
        curl_close($ch);
	}
    
    // フロント側から送られてきたデータの設定
    function setData($post_data)
    {
        $this->data['utt']      = $post_data['utt'];
        $this->data['mode']     = $post_data['mode'];
        $this->data['context'] = $post_data['context'];
    }
}
?>
