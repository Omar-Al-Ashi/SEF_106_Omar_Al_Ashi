<?php

class Database
{

    public $DATABASE_LOCATION = "./";
    public $latest_database_used = "NewDatabase";
    public $latest_table_used = "student";

    function __construct()
    {
//        TODO do something
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
     * create a database (Directory) in the current directory if it doesn't
     * exist
     * @param $database_name
     */
    function createDatabase($database_name)
    {
        if (file_exists($this->DATABASE_LOCATION . $database_name)) {
            print("Database '$database_name' already exists") . PHP_EOL;
            $this->latest_database_used = $database_name;
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
    function deleteDatabase($database_name = "")
    {
        if ($database_name == "") {
            $database_name = $this->getLatestDatabaseUsed();
        }
        $database_name = $this->getLatestDatabaseUsed();
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
     * @return string
     */
    public function getLatestDatabaseUsed()
    {
        return $this->latest_database_used;
    }

    /**
     * @param string $latest_database_used
     */
    public function setLatestDatabaseUsed($latest_database_used)
    {
        $this->latest_database_used = $latest_database_used;
    }

    /**
     * creates a file in the current directory, inside the latest_used_database,
     * if the database is not created, it creates it first
     * @param $table_name
     */
    function createTable($table_name)
    {
        if ((!file_exists("./$this->latest_database_used/"))) {
            mkdir($this->DATABASE_LOCATION . $this->latest_database_used, 0777);
        }
        if (file_exists("./$this->latest_database_used/$table_name.txt")) {
            print("Table '$table_name' already exists") . PHP_EOL;
        } else {
            $file = fopen("./$this->latest_database_used/$table_name.txt", "w");
            print("Table '$table_name' is created") . PHP_EOL;
            fclose($file);
        }

        $this->setLatestTableUsed($table_name);
    }

    /**
     * deletes table if exists
     * @param $table_name
     */
    function deleteTable($table_name = "")
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
     * @return string
     */
    public function getLatestTableUsed()
    {
        return $this->latest_table_used;
    }

    /**
     * @param string $latest_table_used
     */
    public function setLatestTableUsed($latest_table_used)
    {
        $this->latest_table_used = $latest_table_used;
    }

    /**
     * Takes a JSON representation of the data and insert it into the last used
     * table
     * @param $json_format
     */
    function insertIntoTable($json_format)
    {
        $table_name = $this->getLatestTableUsed();
        $database_name = $this->getLatestDatabaseUsed();
        $file_location = "./" . $database_name . "/" . $table_name . ".txt";
        file_put_contents($file_location, $json_format . PHP_EOL, FILE_APPEND);
        print("Successfully Added into table '$table_name'") . PHP_EOL;
    }

    /**
     * gets as a parameter a keyword to search for, returns the lines (json line)
     * that keyword is found in
     * @param $searchfor
     * @return string as a JSON representation
     */
    function selectFromTable($searchfor)
    {
        $table_name = $this->getLatestTableUsed();
        $database_name = $this->getLatestDatabaseUsed();


        $file_location = "./" . $database_name . "/" . $table_name . ".txt";

        if (!file_exists($file_location)) {
            print("Table '$table_name' does not exist to select from it") . PHP_EOL;
        } else {
            // get the file contents, assuming the file to be readable (and exist)
            $contents = file_get_contents($file_location);
            // escape special characters in the query
            $pattern = preg_quote($searchfor, '/');
            // finalise the regular expression, matching the whole line
            $pattern = "/^.*$pattern.*\$/m";
//         search, and store all matching occurences in $matches
//        TODO The problem here is that it is searching for anything that contains this expression, I don't want this I want it to search for absolutely the same whole expression
            if (preg_match_all($pattern, $contents, $matches)) {
                $result_found = "Result found: \n" . implode("\n", $matches[0]) . PHP_EOL;
                return $result_found;
            } else {
                return "No matches found" . PHP_EOL;
            }
        }
    }

//    TODO add a flag if a line is deleted
    function deleteLineInFile($string)
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
// TODO a problem here is it deletes all entries that contains the string and adds one time
    function updateFieldInTable($string, $json_format){
        $this->deleteLineInFile($string);
        $this->insertIntoTable($json_format);
        print("Updated successfully").PHP_EOL;
    }
}

//$database_instance = new Database();
//$database_instance->createDatabase("NewDatabase");
//$database_instance->createTable("student");
//$database_instance->insertIntoTable("whatever");
//$database_instance->deleteTable("student");
//$database_instance->deleteDatabase("NewDatabase");
//print($database_instance->selectFromTable("whatever"));
//$database_instance->updateFieldInTable("omar", "ahmad");