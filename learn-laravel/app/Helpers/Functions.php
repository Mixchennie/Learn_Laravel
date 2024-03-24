<?php
use App\Models\Groups;
function isUppercase($value, $message, $fail){
    if ($value!=mb_strtoupper($value, 'UTF-8')){
        // xảy ra lỗi
        $fail($message);
    }
}

function getAllGroups(){
    return Groups::getAll();
}