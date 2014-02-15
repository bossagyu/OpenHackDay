<?php

function update($mode)
{
    if ($mode === "rerank") {
        if (system("sh update.sh rerank") == false) {
            return false;
        } else {
            return true;
        }
    else {
        if (system("sh update.sh") == false) {
            return false;
        } else {
            return true;
        }
    }
        
}
?>
