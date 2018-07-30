<?php

$configs = require_once('config.php');

$dbCon = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db_name']);
echo "Hello from OrderProcess.php";