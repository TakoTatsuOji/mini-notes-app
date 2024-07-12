<?php

use Classes\Database;

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$id = $_GET['id'];

$note = $db->querySelectOne([':id' => $id], ['title', 'body']);

view('show.view.php', [
    'website_title' => $note['title'],
    'note' => $note
]);