<?php

$website_title = "Add Note";

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    $title = isInputBlank($_POST['title']);
    $body = isInputBlank($_POST['body']);

    if ($title == null || $body == null) {
        $errors['empty'] = "Don't leave the fields blank";
    } else {
        $db->queryInsert([':title' => $title, ':body' => $body]);
    
        header("Location: /");
    
        die();
    }

}

require 'views/add.view.php';