<?php

require_once("config.php");

class MySQLWrap
{
    function __construct()
    {
        $config = new config();

        $dbCon = new mysqli($config->config['host'], $config->config['username'], $config->config['password'], $config->config['db_name']);
    }

    public function checkUserLogin($first_name, $last_name, $email)
    {
        $config = new config();

        $dbCon = new mysqli($config->config['host'], $config->config['username'], $config->config['password'], $config->config['db_name']);
        if (!$dbCon->connect_error) {
            $check_user_availability_query = "SELECT * from customer where first_name = '" . $first_name . "' AND last_name = '" . $last_name . "' AND email = '" . $email . "' ";
            $result = $dbCon->query($check_user_availability_query);
            $rows = $result->num_rows;

            if ($rows == 1) {

//        create session
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["first_name"] = $first_name;
                $_SESSION["last_name"] = $last_name;
                return true;

            } else {
                return false;
            }
        }
    }

    public function getAddresses()
    {
        $config = new config();

        $dbCon = new mysqli($config->config['host'], $config->config['username']
            , $config->config['password'], $config->config['db_name']);
        if (!$dbCon->connect_error) {
            $get_addresses_query = "select address from address inner join 
            store s on address.address_id = s.address_id;";
            $result = $dbCon->query($get_addresses_query);

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

    }

    public function getMovies()
    {
        $config = new config();

        $dbCon = new mysqli($config->config['host'], $config->config['username'],
            $config->config['password'], $config->config['db_name']);
        if (!$dbCon->connect_error) {
            $result = $dbCon->query("select F.title
                from inventory as I 
                inner join film as F on F.film_id = I.film_id 
                where inventory_in_stock(I.inventory_id) 
                group by F.title;");
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
    }

    public function rentAMovie(){
        
    }
}