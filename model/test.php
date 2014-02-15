<?php

require("./recomend_model/recomendSpot.php");
/*
if (update("hoge") === FALSE) {
    echo "NG";
} else{
    echo "OK";
}
*/

$arr = getSpot(5);
echo $arr[0]["title"];
echo $arr[0]["url"];
