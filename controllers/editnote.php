<?php

$id = $_GET['id'];

$title = isInputBlank($_POST['title'], $id);
$body = isInputBlank($_POST['body'], $id);

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$db->queryUpdate([':id' => $id, ':title' => $title, ':body' => $body]);

header("Location: /");

die();