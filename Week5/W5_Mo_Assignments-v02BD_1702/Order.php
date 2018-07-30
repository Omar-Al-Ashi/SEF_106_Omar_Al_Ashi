<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Order Page</title>
</head>
<body>

<!--rental-->
<div class="rental" id="rental"
     style="border-style: solid;border-width: 3px;width: 400px">
    <h1>Rental</h1>
    <!--    <form action="/new_assignment/OrderProcess.php" method="post">-->
    <form action="/new_assignment/OrderProcess.php" method="post" name="rental">

        <?php



        $configs = require_once('config.php');

        $dbCon = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db_name']);
        $result = $dbCon->query("select address from address
        inner join store s on address.address_id = s.address_id;");

        if (!$dbCon->connect_error) {
            echo "<strong><label>Store</label></strong><br>";
            echo "<select name='store_address' style='width: 200px'>";

            $rows = $result->num_rows;

            for ($i = 0; $i < $rows; ++$i) {
                $result->data_seek($i);
                $rows = $result->fetch_array(MYSQLI_ASSOC);
                foreach ($rows as $key => $value) {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
            }
            echo "</select><br>";
        }

//        TODO edit the query to get the store_address
        $result = $dbCon->query("select distinct title from film inner join inventory i on film.film_id = i.film_id
where i.store_id  =  1");

        if (!$dbCon->connect_error) {
            echo "<strong><label>Film</label></strong><br>";
            echo "<select name='films' style='width: 200px'>";

            $rows = $result->num_rows;

            for ($i = 0; $i < $rows; ++$i) {
                $result->data_seek($i);
                $rows = $result->fetch_array(MYSQLI_ASSOC);
                foreach ($rows as $key => $value) {
                    echo '<option value="' . $value . '">' . $value . '</option>';
                }
            }
            echo "</select><br>";
        }

        ?>

        <input type="submit" value="rental" name="rental">

    </form>
    <?php

    $store_address = $_POST['store_address'];
    echo $store_address;

    ?>
</div>


</body>
</html>

