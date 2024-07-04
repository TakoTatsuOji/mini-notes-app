<?php

$title = isInputBlank($_POST['title']);
$body = isInputBlank($_POST['body']);

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$db->queryInsert([':title' => $title, ':body' => $body]);

header("Location: /");

die();