<?php

use Classes\Database;
use Classes\Validator;

$db_config = require basePath('dbconfig.php');

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$id = $_GET['id'];

$current_note_content = $db->querySelectOne([':id' => $id], ['title', 'body']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = isInputBlank($_POST['title']);
    $body = isInputBlank($_POST['body']);

    if (Validator::stringInputChecker($title, 1000) || Validator::stringInputChecker($body, 1000)) {
        $errors['inputerr'] = "Input can't be blank or can't go above 100 characters";
    } else {
        $db->queryUpdate([':id' => $id, ':title' => $title, ':body' => $body]);
    
        header("Location: /");
    
        die();
    }

}

view('edit.view.php', [
    'website_title' => "Edit {$current_note_content['title']} Note",
    'current_note_content' => $current_note_content,
    'errors' => $errors
]);