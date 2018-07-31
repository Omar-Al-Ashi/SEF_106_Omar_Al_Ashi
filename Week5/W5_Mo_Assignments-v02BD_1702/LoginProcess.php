<?php
require_once('MySQLWrap.php');
require_once("config.php");


// login form
$login_email = htmlspecialchars($_POST['login_email']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);


$check_user_login = new MySQLWrap();
$user_login_result = $check_user_login->checkUserLogin($first_name, $last_name, $login_email);

if ($user_login_result){
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    header('Location: Order.php');
}
else{
    print("The user is not available<br>");
    print('<a href="login.php">Go to login</a>');
}
