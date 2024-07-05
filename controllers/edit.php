<?php

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$id = $_GET['id'];

$current_note_content = $db->querySelectOne([':id' => $id], ['title', 'body']);

$website_title = "Edit {$current_note_content['title']} Note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    $title = isInputBlank($_POST['title']);
    $body = isInputBlank($_POST['body']);

    if ($title == null || $body == null) {
        $errors['empty'] = "Don't leave the fields blank";
    } else {
        $db->queryUpdate([':id' => $id, ':title' => $title, ':body' => $body]);
    
        header("Location: /");
    
        die();
    }

}

require 'views/edit.view.php';