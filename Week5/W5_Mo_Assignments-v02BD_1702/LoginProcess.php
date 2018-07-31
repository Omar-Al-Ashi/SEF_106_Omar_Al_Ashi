<?php
require_once ('MySQLWrap.php');
require_once ("config.php");


// login form
$login_email = htmlspecialchars($_POST['login_email']);
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);


//$check_user_login = new MySQLWrap();
//$user_login_result = $check_user_login->check_user_login($first_name, $last_name, $login_email);
$config = new config();


//$dbCon = new mysqli($config['host'], $config['username'], $config['password'], $config['db_name']);
$dbCon = new mysqli('localhost', 'phpuser', 'toor', 'sakila');
$check_user_availability_query = "SELECT * from customer where first_name = '" . $first_name . "' AND last_name = '" . $last_name . "' AND email = '" . $login_email. "' ";
$result = $dbCon->query($check_user_availability_query);



$rows = $result->num_rows;

if ($rows == 1) {

//  create session
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    header('Location: Order.php');

} else {
//    return false;
    print("The user is not available<br>");
    print('<a href="login.php">Go to login</a>');
}


//if ($user_login_result){
//    header('Location: Order.php');
//}
//else{
//    print("The user is not available");
//    print('<a href="login.php">Go to login</a>');
//}

?>