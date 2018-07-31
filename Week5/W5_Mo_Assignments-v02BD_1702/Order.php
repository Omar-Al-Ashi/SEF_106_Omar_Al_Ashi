<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Order Page</title>
</head>
<body>

<?php
require_once("config.php");
require_once ("MySQLWrap.php");
$configs = new config();
session_start();
print('<p class="welcome">Welcome ') . "<strong>" . $_SESSION["first_name"] . " " .
    $_SESSION["last_name"] . "</strong></p><br><br>";
?>

<!--rental-->
<div class="rental" id="rental">
    <h1>Rental</h1>
    <form action="OrderProcess.php" method="post"
          name="rental">

        <?php
        $MySqlInstance = new MySQLWrap();
//        $MySqlInstance->get_addresses();

        $MySqlInstance = new MySQLWrap();
        $MySqlInstance->getMovies();

        ?>
        <input type="submit" value="rental" name="rental">

    </form>
</div>

</body>
</html>

