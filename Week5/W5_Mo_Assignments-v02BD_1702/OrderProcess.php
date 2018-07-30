<?php

$configs = require_once('config.php');

$dbCon = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db_name']);


// register form
$register_first_name = htmlspecialchars($_POST['register_first_name']);
$register_last_name = htmlspecialchars($_POST['register_last_name']);
$register_email = htmlspecialchars($_POST['register_email']);
$register_password = htmlspecialchars($_POST['register_password']);
$register_address = htmlspecialchars($_POST['register_address']);
$register_district = htmlspecialchars($_POST['register_district']);
$register_postal_code = htmlspecialchars($_POST['register_postal_code']);
$register_phone_number = htmlspecialchars($_POST['register_phone_number']);
$register_country = $_POST['register_country'];
$register_city = $_POST['register_city'];


// login form
$login_email = htmlspecialchars($_POST['login_email']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);


// rental
$store_address = $_POST['store_address'];
$films = $_POST['films'];


if (!$dbCon->connect_error) {

//   TODO add rent DVD

}