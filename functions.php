<?php

function dd(mixed $value) {
    echo "<pre>";

    var_dump($value);

    echo "</pre>";

    die();
}

function isInputBlank(mixed $value) {

    if (empty($value)) {
        // $error = http_build_query(['error' => 'Don\'t leave the fields blank!'], "&");
        return null;
    }

    return htmlspecialchars($value);
}