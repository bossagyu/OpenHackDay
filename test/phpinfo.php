<?php

// すべての情報を表示します。デフォルトは INFO_ALL です。
if (function_exists('explode')) {
    echo htmlspecialchars("func関数が利用可能です。\n", ENT_QUOTES, 'UTF-8');
    } else {
        echo htmlspecialchars("func関数は利用できません。\n", ENT_QUOTES, 'UTF-8');
        }
?>
