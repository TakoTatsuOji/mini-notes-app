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

    return htmlspecialchars(trim($value));
}

function basePath($path) {
    return BASE_PATH . $path;
}

function view($viewPath, $attr = []) {
    extract($attr);
    require basePath('views/' . $viewPath);
}