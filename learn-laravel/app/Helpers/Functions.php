<?php

function isUppercase($value, $message, $fail){
    if ($value!=mb_strtoupper($value, 'UTF-8')){
        // xảy ra lỗi
        $fail($message);
    }
}
?>