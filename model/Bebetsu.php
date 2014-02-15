<?php

class Bebetsu
{
	public $result;
    
    public function bebetsu($message)
    {
        $command = "echo ${message} | mecab";
	    exec($command, $resultData);
        $flag =0;

	    foreach ($resultData as $v) {
		    $first = explode("\n", $v);
		    foreach ($first as $keyword) {
			    $word = explode(",", $keyword);
			    if ($word[6] == "*") {
				    return ($message);
                } else {
				    $firstWord = mb_substr($word[8], 0, 3);
				    $hiragana = mb_convert_kana($firstWord, "c", "UTF-8");
				    $tsundere = $hiragana."、".$message."///";
				    return ($tsundere);
			    }
		    }
	    }
    }
}

?>
