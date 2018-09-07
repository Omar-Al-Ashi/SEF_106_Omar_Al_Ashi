<?php
require_once('config.php');

class Database_Wrapper
{
    /**
     * @var mysqli
     */
    private $dbCon;

    /**
     * Database_Wrapper constructor.
     * connects to the DB
     */
    public function __construct()
    {
        $config = new config();
        $this->dbCon = new mysqli($config->config['host'], $config->config['username'], $config->config['password'], $config->config['db_name']);
        if ($this->dbCon->connect_error)
            echo "Connection to the db error" . PHP_EOL;

//        print_r($this->createCustomerHandler("first", "last", "email", 1, 1, 1)).PHP_EOL;
//        print_r($this->createAddress("address1", "address2", "district", 1, 1, 12));
//        print_r($this->createFilm('title', 'description', 2017, 1, 1, 1, 1, 2, 1, 'G', 'Trailers'));
//        print_r($this->createActorHandler('first name', 'last name'));
    }

    function returnAll($table_name)
    {
        $result_array = array();
        $select_query = "SELECT * FROM $table_name";
        $result = $this->dbCon->query($select_query);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($result_array, json_encode($row));
            }
            return $result_array;
        } else {
            return "0 results" . PHP_EOL;
        }
    }

    function createCustomerHandler($first_name, $last_name, $email, $address_id, $active, $store_id)
    {
        $this->createCustomer($first_name, $last_name, $email, $address_id, $active, $store_id);
        return $this->returnCustomer($first_name, $last_name, $email, $address_id, $active, $store_id);
    }

    function createCustomer($first_name, $last_name, $email, $address_id, $active, $store_id)
    {
        $insert_query = "INSERT INTO customer ( first_name, last_name, email, address_id, active, store_id) VALUES ('$first_name', '$last_name', '$email', $address_id, $active, $store_id)";

        if ($this->dbCon->query($insert_query) === TRUE) {
            echo "insert is done".PHP_EOL;
            echo $this->returnCustomer($first_name, $last_name, $email, $address_id, $active, $store_id);
        } else {
            return "error while inserting";
        }
    }

    function returnCustomer($first_name, $last_name, $email, $address_id, $active, $store_id)
    {
        $select_query = "SELECT * FROM customer WHERE first_name = '$first_name' AND last_name = '$last_name' AND email = '$email' AND address_id = '$address_id' AND store_id = '$store_id' AND active = '$active';";
        $result = $this->dbCon->query($select_query);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return (json_encode($row));
            }
        } else {
            return "0 results" . PHP_EOL;
        }
    }

    function returnAllCustomers()
    {
        $customer = array();
        $selectAllQuery = "SELECT * from customer";
        $result = $this->dbCon->query($selectAllQuery);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($customer, json_encode($row));
//                return (json_encode($row));
            }
            return $customer;
        } else {
            return "0 results" . PHP_EOL;
        }
    }

    function createAddressHandler($address, $district, $city_id, $postal_code, $phone, $location = 'ST_GeomFromText(\'POLYGON((0 0,10 0,10 10,0 10,0 0),(5 5,7 5,7 7,5 7, 5 5))\'', $address2 = "")
    {
        $this->createAddress($address, $address2 = "", $district, $city_id, $postal_code, $phone, $location = 'ST_GeomFromText(\'POLYGON((0 0,10 0,10 10,0 10,0 0),(5 5,7 5,7 7,5 7, 5 5))\'');
        return $this->returnAddress($address, $address2 = "", $district, $city_id, $postal_code, $phone, $location = 'ST_GeomFromText(\'POLYGON((0 0,10 0,10 10,0 10,0 0),(5 5,7 5,7 7,5 7, 5 5))\'');
    }

    function createAddress($address, $address2 = "", $district, $city_id, $postal_code, $phone, $location = 'ST_GeomFromText(\'POLYGON((0 0,10 0,10 10,0 10,0 0),(5 5,7 5,7 7,5 7, 5 5))\'')
    {
        $insert_address_query = "INSERT INTO address (address, address2, district, city_id, postal_code, phone, location) VALUES ('$address', '$address2', '$district', $city_id, $postal_code, $phone, $location))";

        if ($this->dbCon->query($insert_address_query) === TRUE) {
            echo "insert is done from address".PHP_EOL;
            echo $this->returnAddress($address, $address2, $district, $city_id, $postal_code, $phone, $location);
        } else {
            return "error while inserting in address";
        }
    }

    function returnAddress($address, $address2 = "", $district, $city_id, $postal_code, $phone, $location = 'ST_GeomFromText(\'POLYGON((0 0,10 0,10 10,0 10,0 0),(5 5,7 5,7 7,5 7, 5 5))\'')
    {
        $select_address_query = "SELECT * FROM address WHERE address= '$address' AND address2 = '$address2' AND district = '$district' AND city_id = '$city_id' AND postal_code = '$postal_code' AND phone = '$phone';";
        $result = $this->dbCon->query($select_address_query);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return json_encode($row);
            }
        } else {
            return "0 results";
        }
    }

    function returnAllAddresses()
    {
        $address = array();
        $selectAllQuery = "SELECT * from address";
        $result = $this->dbCon->query($selectAllQuery);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($address, json_encode($row));
//                return (json_encode($row));
            }
            return $address;
        } else {
            return "0 results" . PHP_EOL;
        }
    }

    function createFilmHandler($title, $description, $release_year, $language_id, $original_language_id, $rental_duration, $rental_rate, $length, $replacement_cost, $rating, $special_features)
    {
        $this->createFilm($title, $description, $release_year, $language_id, $original_language_id, $rental_duration, $rental_rate, $length, $replacement_cost, $rating, $special_features);
        return ($this->returnFilm($title, $description, $release_year, $language_id, $original_language_id, $rental_duration, $rental_rate, $length, $replacement_cost, $rating, $special_features));
    }

    function createFilm($title, $description, $release_year, $language_id, $original_language_id, $rental_duration, $rental_rate, $length, $replacement_cost, $rating, $special_features)
    {
        $insert_film_query = "INSERT INTO film (title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features) VALUES ('$title', '$description', '$release_year', '$language_id', '$original_language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating', '$special_features');";

        if ($this->dbCon->query($insert_film_query) === TRUE) {
            echo "insert is done from Film".PHP_EOL;
            echo $this->returnFilm($title, $description, $release_year, $language_id, $original_language_id, $rental_duration, $rental_rate, $length, $replacement_cost, $rating, $special_features);
        } else {
            return "error while inserting in film";
        }
    }

    function returnFilm($title, $description, $release_year, $language_id, $original_language_id, $rental_duration, $rental_rate, $length, $replacement_cost, $rating, $special_features)
    {
        $select_film_query = "SELECT * FROM film WHERE title = '$title' AND description = '$description' AND release_year = '$release_year' AND language_id = '$language_id' AND original_language_id = '$original_language_id' AND rental_duration = '$rental_duration' AND rental_rate = '$rental_rate' AND length = '$length' AND replacement_cost = '$replacement_cost' AND rating = '$rating' AND special_features = '$special_features';";

        $result = $this->dbCon->query($select_film_query);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return json_encode($row);
            }
        } else {
            return "0 results";
        }
    }

    function returnAllFilms()
    {
        $films = array();
        $selectAllQuery = "SELECT * from film";
        $result = $this->dbCon->query($selectAllQuery);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($films, json_encode($row));
//                return (json_encode($row));
            }
            return $films;
        } else {
            return "0 results" . PHP_EOL;
        }
    }

    function createActorHandler($first_name, $last_name)
    {
        $this->createActor($first_name, $last_name);
        return ($this->returnActor($first_name, $last_name));
    }

    function createActor($first_name, $last_name)
    {
        $insert_actor_query = "INSERT INTO actor (first_name, last_name) VALUES ('$first_name', '$last_name')";

        if ($this->dbCon->query($insert_actor_query) === TRUE) {
            echo "insert is done from actor">PHP;
            echo $this->returnActor($first_name, $last_name);
        } else {
            return "error while inserting in actor";
        }
    }

    function returnActor($first_name, $last_name)
    {
        $select_actor_query = "SELECT * FROM actor WHERE first_name = '$first_name' AND last_name = '$last_name'";

        $result = $this->dbCon->query($select_actor_query);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return json_encode($row);
            }
        } else {
            return "0 results";
        }
    }

    function returnAllActors()
    {
        $actor = array();
        $selectAllQuery = "SELECT * from actor";
        $result = $this->dbCon->query($selectAllQuery);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($actor, json_encode($row));
//                return (json_encode($row));
            }
            return $actor;
        } else {
            return "0 results" . PHP_EOL;
        }
    }
}


