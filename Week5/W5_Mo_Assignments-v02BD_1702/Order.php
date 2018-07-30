<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Order Page</title>
</head>
<body>
<!--TODO remove the inline styles-->

<!--Register-->
<div class="register" id="register"
     style="border-style: solid;border-width: 3px;width: 400px">
    <h1>Register</h1>
    <form action="/new_assignment/OrderProcess.php" method="post">
        <strong><label>first name</label></strong><br><input type="text"
                                                             name="register_first_name"
                                                             placeholder="first name"><br>
        <strong><label>last name</label></strong><br><input type="text"
                                                            name="register_last_name"
                                                            placeholder="lastname"><br>
        <strong><label>Email Address:</label></strong><br><input type="email"
                                                                 name="register_email"
                                                                 placeholder="email address"><br>
        <strong><label>password</label></strong><br><input type="password"
                                                           name="register_password"
                                                           placeholder="password"><br>
        <strong><label>address:</label></strong><br><input type="text"
                                                           name="register_address"
                                                           placeholder="address"><br>
        <strong><label>district</label></strong><br><input type="text"
                                                           name="register_district"
                                                           placeholder="district"><br>
        <strong><label>postal code</label></strong><br><input type="text"
                                                              name="register_postal_code"
                                                              placeholder="postal code"><br>
        <strong><label>phone number</label></strong><br><input type="number"
                                                               name="register_phone_number"
                                                               placeholder="phone number"><br>


        <?php

        $configs = require_once('config.php');

        $dbCon = new mysqli($configs['host'], $configs['username'], $configs['password'], $configs['db_name']);

        $result = $dbCon->query("select country from country;");

        // country dropdown list
        if (!$dbCon->connect_error) {
            echo "<strong><label>Country</label></strong><br>";
            echo "<select name='register_country' style='width: 200px'>";

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


        $result = $dbCon->query("select city from city;");
        // city dropdown list
        if (!$dbCon->connect_error) {
            echo "<strong><label>City</label></strong><br>";
            echo "<select name='register_city' style='width: 200px'>";

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
        <br>
        <input type="submit" value="register">
    </form>
</div>

<!--login-->
<div class="login" id="login"
     style="border-style: solid;border-width: 3px;width: 400px">
    <h1>Login</h1>
    <form action="/new_assignment/OrderProcess.php" method="post">

        <strong><label>Email Address:</label></strong><br><input type="email"
                                                                 name="login_email"
                                                                 placeholder="email address"><br>
        <strong><label>password</label></strong><br><input type="password"
                                                           name="login_password"
                                                           placeholder="password"><br>
        <input type="submit" value="login">

    </form>
</div>

<!--rental-->
<div class="rental" id="rental"
     style="border-style: solid;border-width: 3px;width: 400px">
    <h1>Rental</h1>
    <!--    <form action="/new_assignment/OrderProcess.php" method="post">-->
    <form action="#" method="post" name="rental">

        <?php
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

        $result = $dbCon->query("select distinct title from film inner join inventory i on film.film_id = i.film_id
where i.store_id  = 1;");

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

    echo $selected_val = $_POST['store_address'];


    ?>
</div>


</body>
</html>

