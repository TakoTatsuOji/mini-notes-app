<?php

function dd(mixed $value) {
    echo "<pre>";

    var_dump($value);

    echo "</pre>";

    die();
}

function isInputBlank(mixed $value, string|int $id = null) {
    if (empty($value)) {
        $error = http_build_query(['error' => 'Don\'t leave the fields blank!'], "&");

        header("Location: {$_SERVER['HTTP_REFERER']}?{$id}{$error}");
        die();
    }

    return $value;
}