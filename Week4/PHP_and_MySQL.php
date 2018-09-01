<?php

$configs = require_once('config.php');

$dbCon = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db_name']);

if ($dbCon->connect_error)
    echo "Connection to the db error";
else
    echo "We're connected to the database";

$query = "SELECT * FROM actor";
$result = $dbCon->query($query);

if (!$result)
    echo "The result is empty";
else {
    $rows = $result->num_rows;

    for ($i = 0; $i < $rows; ++$i) {
        $result->data_seek($i);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        print_r($rows);
    }
}
$result->close();
$dbCon->close();
