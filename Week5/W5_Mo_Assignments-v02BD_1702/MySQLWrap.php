<?php

require_once ("config.php");

class MySQLWrap
{

    public function check_user_login($first_name, $last_name, $email){
        $config = new config();
        print($config);

        $dbCon = new mysqli($config['host'], $config['username'], $config['password'], $config['db_name']);
        $check_user_availability_query = "SELECT * from customer where first_name = '" . $first_name . "' AND last_name = '" . $last_name . "' AND email = '" . $email . "' ";
        $result = $dbCon->query($check_user_availability_query);
//        testing
        print("went into the Wrap");
        $rows = $result->num_rows;
        print_r($rows);

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
