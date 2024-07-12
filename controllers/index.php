<?php

use Classes\Database;

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$notes = $db->querySelectAll(["id", "title"]);

view('index.view.php', [
    'website_title' => 'Notes',
    'notes' => $notes
]);