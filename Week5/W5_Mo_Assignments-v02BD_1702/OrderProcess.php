<?php

$configs = require_once('config.php');

$dbCon = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db_name']);


if ($dbCon->connect_error)
    echo "Connection to the db error";
else
    echo "We're connected to the database";

// check if user is already registered
$query = "SELECT email FROM login";
$result = $dbCon->query($query);

if (!$result){
    $insert_query = "INSERT INTO ";
}

else {
    $rows = $result->num_rows;

}
$result->close();
$dbCon->close();


$register_address = htmlspecialchars($_POST['register_address']);
$register_district = htmlspecialchars($_POST['register_district']);
$register_postal_code = htmlspecialchars($_POST['register_postal_code']);
$register_phone_number = htmlspecialchars($_POST['register_phone_number']);
$register_first_name = htmlspecialchars($_POST['register_first_name']);
$register_last_name = htmlspecialchars($_POST['register_last_name']);
$register_password = htmlspecialchars($_POST['register_password']);
$register_country = htmlspecialchars($_POST['register_country']);
$register_city = htmlspecialchars($_POST['register_city']);


$email = htmlspecialchars($_POST['login_email']);
$password = htmlspecialchars($_POST['login_password']);

print(" email is " . $email . ", password " . $password);
