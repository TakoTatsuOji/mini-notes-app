<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require basePath("{$class}.php");
});

require basePath('routers.php');
