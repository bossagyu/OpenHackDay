<?php
//観光地を取得する関数
function getSpot($spot_num)
{
    $f_name = "recomend.tsv";
    if (!file_exists($f_name)) {
        return false;
    }

    $fp = fopen($f_name, "r");
    $count = 0;
    $spot = array();
    while ($line = fgets($fp)) {
        if ($count++ >= $spot_num) {
            fclose($fp);
	    break;
        }
	rtrim($line);
	$tmp_arr = explode('	', $line);
	$spot_data = array("title" => $tmp_arr[0], "url"=> $tmp_arr[2]);
        array_push($spot, $spot_data);
    }
    return $spot;
}
//レコメするスポットを更新する
//引数にrerankを指定したとき、ユーザの特徴語の計算を変える
function update($mode)
{
    if ($mode === "rerank") {
        if (system("/bin/sh update.sh rerank1") === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
   } else {
        if (system("/bin/sh update.sh") === FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
?>
