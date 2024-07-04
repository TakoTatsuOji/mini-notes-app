<?php


$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$id = $_GET['id'];

$current_note_content = $db->querySelectOne([':id' => $id], ['title', 'body']);

$website_title = "Edit {$current_note_content['title']} Note";

require 'views/edit.view.php';