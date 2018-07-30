<?php

$configs = require_once('config.php');

$dbCon = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db_name']);


// login form
$login_email = htmlspecialchars($_POST['login_email']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);


if (!$dbCon->connect_error) {

    $check_user_availability_query = "SELECT * from customer where first_name = '" . $first_name . "' AND last_name = '" . $last_name . "' AND email = '" . $login_email . "' ";
    $result = $dbCon->query($check_user_availability_query);

    $rows = $result->num_rows;

    if ($rows == 1) {
        echo "The user is available";
        header('Location: Order.php');
    } else {
        echo "The user is not available";
    }
}