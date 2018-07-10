<?php
//$options = getopt("a:e:t:d:s:m");

exec("git log --format='%H - %an - %cd - \"%s\"'", $output);


//exec("git log",$output);

$searchfor = "9-7-2018";
foreach ($output as $value) {
    if (strpos($value, $searchfor) !== false)
    {
        echo "$value".PHP_EOL;
    }
}

?>