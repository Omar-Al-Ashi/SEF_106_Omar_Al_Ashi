<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Order Process</title>
</head>

<?php

require_once('config.php');
require_once ('MySQLWrap.php');

$MySqlInstance = new MySQLWrap();

// rental
$films = $_POST['films'];


if (!$dbCon->connect_error) {

    $MySqlInstance->rentAMovie(10,3,1);

    session_start();
    $first_name = $_SESSION["first_name"] ;
    $films = $_POST['films'];
    $last_name = $_SESSION["last_name"] ;
    print("<p class='done'>The order is done, thanks <b>$first_name $last_name </b>for using our service, you have ordered <b>$films </b></p><br>");
    print('<p class="done"><a href="Order.php">Go to back rental page</a></p>');

}
?>
</html>
