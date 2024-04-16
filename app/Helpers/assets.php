<?php

function js($file_name) {
    return "/js/".$file_name ;
}


function images($file_name) {
    return "/images/".$file_name ;
}

function css($file_name) {
    return "/css/".$file_name ;
}

function resonnance($file_name) {
    return "/resonnance/".$file_name ;
}

function partial($p) {
    include __DIR__ . '/../partials/navbar.php';
}

