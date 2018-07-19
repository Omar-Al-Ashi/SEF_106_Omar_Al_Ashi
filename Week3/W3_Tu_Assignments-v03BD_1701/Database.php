<?php

class Database
{

    public $DATABASE_LOCATION = "./";
    public $latest_database_used = "NewDatabase";
    public $latest_table_used = "student";

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getDATABASELOCATION()
    {
        return $this->DATABASE_LOCATION;
    }

    /**
     * @param string $DATABASE_LOCATION
     */
    public function setDATABASELOCATION($DATABASE_LOCATION)
    {
        $this->DATABASE_LOCATION = $DATABASE_LOCATION;
    }

    /**
     * @return string
     */
    public function getLatestDatabaseUsed()
    {
        $myFile = "./database_table_latest.txt";
        $lines = file($myFile);//file in to an array
        return $lines[0]; //line 2
//        return $this->latest_database_used;
    }

    /**
     * @param string $latest_database_used
     */
    public function setLatestDatabaseUsed($latest_database_used)
    {
        $this->latest_database_used = $latest_database_used;
        if (!file_exists("./database_table_latest.txt")){
            $file = fopen("./database_table_latest.txt", "w");
            fclose($file);
        }
        file_put_contents("./database_table_latest.txt", $latest_database_used.PHP_EOL);
    }

    /**
     * @return string
     */
    public function getLatestTableUsed()
    {
        $myFile = "./database_table_latest.txt";
        $lines = file($myFile);//file in to an array
        return $lines[1]; //line 2
//        return $this->latest_table_used;
    }

    /**
     * @param string $latest_table_used
     */
    public function setLatestTableUsed($latest_table_used)
    {
        $this->latest_table_used = $latest_table_used;
        if (!file_exists("./database_table_latest.txt")){
            mkdir("./database_table_latest.txt", 0777);
        }
        file_put_contents("./database_table_latest.txt", $latest_table_used.PHP_EOL, FILE_APPEND);
    }

    /**
     * create a database (Directory) in the current directory if it doesn't
     * exist
     * @param $database_name
     */
    public function createDatabase($database_name)
    {
        if (file_exists($this->DATABASE_LOCATION . $database_name)) {
            print("Database '$database_name' already exists") . PHP_EOL;
            $this->setLatestDatabaseUsed( $database_name);
        } else {
            mkdir($this->DATABASE_LOCATION . $database_name, 0777);
            print("Database $database_name is created") . PHP_EOL;
//            Assigning the latest used database to that whenever we make a new
//            operation, it is done on this database
            $this->setLatestDatabaseUsed($database_name);
        }
    }

    /**
     * delete database, if it receives params, it will take it, else, use
     * latestDatabaseUsed
     * @param string $database_name
     * @return bool
     */
    public function deleteDatabase($database_name = "")
    {
        if ($database_name == "") {
            $database_name = $this->getLatestDatabaseUsed();
        }
        if (file_exists($this->DATABASE_LOCATION . $database_name)) {
            if (is_dir($database_name))
                $dir_handle = opendir($database_name);
            if (!$dir_handle)
                return false;
            while ($file = readdir($dir_handle)) {
                if ($file != "." && $file != "..") {
                    if (!is_dir($database_name . "/" . $file))
                        unlink($database_name . "/" . $file);
                    else
                        delete_directory($database_name . '/' . $file);
                }
            }
            closedir($dir_handle);
            rmdir($database_name);
            print("Database $database_name is deleted") . PHP_EOL;
        } else {
            print("Database '$database_name' doesn't exist") . PHP_EOL;
        }
    }

    /**
     * creates a file in the current directory, inside the latest_used_database,
     * if the database is not created, it creates it first
     * @param $table_name
     */
    public function createTable($table_name)
    {
        $latest_database_used = $this->getLatestDatabaseUsed();

        print($latest_database_used);


        if ((!file_exists("./$latest_database_used/"))) {
            mkdir($this->DATABASE_LOCATION . $latest_database_used
                , 0777);
        }
        if (file_exists("./$latest_database_used/$table_name.txt")) {
            print("Table '$table_name' already exists") . PHP_EOL;
        } else {
            fopen("./$latest_database_used/$table_name.txt"
                , "w");
            print("Table '$table_name' is created") . PHP_EOL;
//            fclose($file);
        }

        $this->setLatestTableUsed($table_name);
    }

    /**
     * deletes table if exists
     * @param $table_name
     */
    public function deleteTable($table_name = "")
    {
        if ($table_name == "") {
            $table_name = $this->getLatestTableUsed();
        }
        if (file_exists("./$this->latest_database_used/$table_name.txt")) {
            unlink("./$this->latest_database_used/$table_name.txt");
            print("Table '$table_name' is deleted") . PHP_EOL;
        } else {
            print("Table $table_name doesn't exist") . PHP_EOL;
        }
    }

    /**
     * Takes a JSON representation of the data and insert it into the last used
     * table
     * @param $json_format
     */
    public function insertIntoTable($json_format)
    {
        $table_name = $this->getLatestTableUsed();
        $database_name = $this->getLatestDatabaseUsed();
        $file_location = "./" . $database_name . "/" . $table_name . ".txt";
        file_put_contents($file_location, $json_format . PHP_EOL,
            FILE_APPEND);
        print("Successfully Added into table '$table_name' ") . PHP_EOL;
    }

    /**
     * gets as a parameter a keyword to search for, returns the lines(json line)
     * that keyword is found in
     * @param $searchfor
     * @return string as a JSON representation
     */
    public function GET($searchfor)
    {
        $table_name = $this->getLatestTableUsed();
        $database_name = $this->getLatestDatabaseUsed();


        $file_location = "./" . $database_name . "/" . $table_name . ".txt";

        if (!file_exists($file_location)) {
            print("Table '$table_name' does not exist to select from it") . PHP_EOL;
        } else {
            $contents = file_get_contents($file_location);
            $pattern = preg_quote($searchfor, '/');
            $pattern = "/^.*$pattern.*\$/m";
            if (preg_match_all($pattern, $contents, $matches)) {
                $result_found = "Result found: \n" . implode("\n"
                        , $matches[0]) . PHP_EOL;
                return $result_found;
            } else {
                return "No matches found" . PHP_EOL;
            }
        }
    }

    public function deleteLineInFile($string)
    {
        $i = 0;
        $found = false;
        $array = array();
        $table_name = $this->getLatestTableUsed();
        $database_name = $this->getLatestDatabaseUsed();

        $file_location = "./" . $database_name . "/" . $table_name . ".txt";
        if (!file_exists($file_location)) {
            print("Table '$table_name' doesn't exist") . PHP_EOL;
        } else {
            $read = fopen($file_location, "r");
            $read = fopen($file_location, "r");
            while (!feof($read)) {
                $array[$i] = fgets($read);
                ++$i;
            }
            fclose($read);

            $write = fopen($file_location, "w");

            foreach ($array as $a) {
                if (!strstr($a, $string)) {
                    fwrite($write, $a);

                }
            }
            fclose($write);
        }
    }

// TODO a problem here is it deletes all entries that contains the string and
// adds one time
    public function updateFieldInTable($string, $json_format)
    {
        $this->deleteLineInFile($string);
        $this->insertIntoTable($json_format);
        print("Updated successfully") . PHP_EOL;
    }
}
