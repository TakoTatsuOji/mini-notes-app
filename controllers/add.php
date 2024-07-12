<?php

use Classes\Database;
use Classes\Validator;

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = isInputBlank($_POST['title']);
    $body = isInputBlank($_POST['body']);

    if (Validator::stringInputChecker($title, 1000) || Validator::stringInputChecker($body, 1000)) {
        $errors['inputerr'] = "Input can't be blank or can't go above 1000 characters";
    } else {
        $db->queryInsert([':title' => $title, ':body' => $body]);
    
        header("Location: /");
    
        die();
    }

}

view('add.view.php', [
    'website_title' => "Add Note",
    'errors' => $errors
]);