<?php

// function to read the file access.log, parse it and extract the relevant info
function parse_access_log()
{
    $file_name = "/var/log/apache2/access.log";
    $file = fopen($file_name, "r");

    // if no file exists
    if ($file == false) {
        echo("Error in opening file");
        exit();
    }
    // read the file and save it in a string
    $file_size = filesize($file_name);
    $file_text = fread($file, $file_size);
    fclose($file);

    // split the string into an array
    $file_array = preg_split("/ /", $file_text);
//    echo("$file_text \n");

    // assigning the relevant info from the array into variables
    $ip = $file_array[0];
    $date = str_replace("[", "", $file_array[3]);
    $correct_date_format = substr($date, 0, strpos($date, ":"));
    $method = str_replace("\"", "", $file_array[5]);
    $response_file = str_replace("\/", "", $file_array[6]);
    $response_code = $file_array[8];


    // printing the values in the required format
    print("$ip -- $date -- \"$method $response_file\" -- $response_code");
}

//still needs work, it doesn't show the date in the format the question states, and it only checks for the first line
parse_access_log();

?>