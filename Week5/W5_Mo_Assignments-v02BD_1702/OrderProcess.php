<?php

require_once('config.php');
require_once ('MySQLWrap.php');

$MySqlInstance = new MySQLWrap();
//
//$config = new config();
//$dbCon = new mysqli($config->config['host'], $config->config['username'], $config->config['password'], $config->config['db_name']);


// rental
$store_address = $_POST['store_address'];
$films = $_POST['films'];


if (!$dbCon->connect_error) {

    $MySqlInstance->rentAMovie();
    print("no errors");
//   TODO add rent DVD

}