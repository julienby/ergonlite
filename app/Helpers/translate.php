<?php

function translate($key) {
    global $translations;
    return $translations[$key] ?? "undefined";
}

