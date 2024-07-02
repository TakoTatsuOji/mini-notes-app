<?php

$website_title = "Notes";

$db_config = require 'dbconfig.php';

$db = new Database($db_config['dsn_params'], $db_config['username'], $db_config['password']);

$notes = $db->querySelectAll(["id", "title"]);

require 'views/index.view.php';