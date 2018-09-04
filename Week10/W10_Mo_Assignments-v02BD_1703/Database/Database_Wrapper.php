<?php
require_once('config.php');

class Database_Wrapper
{
    private $dbCon;

    public function __construct()
    {
        $config = new config();
        $this->dbCon = new mysqli($config->config['host'], $config->config['username'], $config->config['password'], $config->config['db_name']);
        if ($this->dbCon->connect_error)
            echo "Connection to the db error";
        else {
            echo "We're connected to the database";
        }
        $this->createCustomer("first name", "last_name", "email", 1, 1, 1);
    }

    function createCustomer($first_name, $last_name, $email, $address_id, $store_id, $active)
    {
        $config = new config();
        $this->dbCon = new mysqli($config->config['host'], $config->config['username'], $config->config['password'], $config->config['db_name']);
        $insert_query = "INSERT INTO customer (first_name, last_name, email, address_id, active, store_id) VALUES ($first_name, $last_name, $email, $address_id, $active, $store_id)";
        $select_query = "SELECT * FROM customer WHERE first_name=$first_name AND last_name=$last_name, AND email=$email";

        if ($this->dbCon->query($insert_query) === TRUE) {
            echo "insert is done";
        } else {
            echo "error while inserting";
        }
    }
}

$database = new Database_Wrapper();


