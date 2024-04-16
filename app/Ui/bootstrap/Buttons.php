<?php

function primaryButton($text, $attributes = []) {
    $attrString = '';
    foreach ($attributes as $key => $value) {
        $attrString .= " $key=\"$value\"";
    }
    return "<button type=\"button\" class=\"btn btn-primary\"$attrString>$text</button>";
}

