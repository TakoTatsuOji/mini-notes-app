<?php

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$id = $_GET['id'];

$db->queryDelete([':id' => $id]);

header("Location: {$_SERVER['HTTP_REFERER']}");

die();