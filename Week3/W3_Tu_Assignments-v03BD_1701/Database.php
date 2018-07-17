<?php

class Database
{
    public $DATABASE_LOCATION = "./";
    // default value
    public $latest_database_used = "NewDatabase";

    function __construct()
    {
//        TODO do something
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
//            Assigning the lastest used database to that whenever we make a new
//            operation, it is done on this database
            $this->latest_database_used = $database_name;
        }
    }

    /**
     * delete the database by deleting all it files and folder recursively and
     * then deleting the database
     * @param $database_name
     * @return bool
     */
    function deleteDatabase($database_name = "NewDatabase")
    {
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
     * creates a file in the current directory, inside the latest_used_database
     * @param $table_name
     */
    function createTable($table_name)
    {
        if (file_exists("./$this->latest_database_used/$table_name.txt")) {
            print("Table '$table_name' already exists") . PHP_EOL;
        } else {
            mkdir($this->DATABASE_LOCATION . $this->latest_database_used, 0777);
            $file = fopen("./$this->latest_database_used/$table_name.txt", "w");
            print("Table '$table_name' is created") . PHP_EOL;
            fclose($file);
        }

    }

    /**
     * deletes table if exists
     * @param $table_name
     */
    function deleteTable($table_name)
    {
        if (file_exists("./$this->latest_database_used/$table_name.txt")) {
            unlink("./$this->latest_database_used/$table_name.txt");
            print("Table '$table_name' is deleted");
        } else {
            print("Table $table_name doesn't exist");
        }
    }

//    TODO add parameters
    function insertIntoTable()
    {
        
    }


}

$database_instance = new Database();
//$database_instance->createDatabase("NewDatabase");
$database_instance->createTable("student");
//$database_instance->deleteTable("student");
//$database_instance->deleteDatabase("NewDatabase");