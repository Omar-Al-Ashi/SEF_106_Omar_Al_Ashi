<?php


require_once "Database/Database_Wrapper.php";
/*
    The following function will strip the script name from URL
    i.e.  http://www.something.com/search/book/fitzgerald will become /search/book/fitzgerald
*/
$database = new Database_Wrapper();

function getCurrentUri()
{
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    return $uri;
}

$base_url = getCurrentUri();
$routes = array();
$routes = explode('/', $base_url);
foreach ($routes as $route) {
    if (trim($route) != '')
        array_push($routes, $route);
}
function getQueryString($query_string)
{
    parse_str($query_string, $get_array);
    return ($get_array);
}

/*
Now, $routes will contain all the routes. $routes[0] will correspond to first route.
For e.g. in above example $routes[0] is search, $routes[1] is book and $routes[2] is fitzgerald
*/
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($routes[1]) {
        case "customers":
            print_r($database->returnAll("customer"));
            break;
        case "addresses":
            print_r($database->returnAll("address"));
            break;
        case "films":
            print_r($database->returnAll("film"));
            break;
        case "actors":
            print_r($database->returnAll("actor"));
            break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($routes[1]) {
        case "customers":
            ($database->createCustomerHandler("first name fuckers", "last name", "email", 1, 1, 1));
            break;
        case "addresses":
            ($database->createAddressHandler("whatever", "blaa", 1, 12, 123));
            break;
        case "films":
            ($database->createFilmHandler("title", "whatever", 2012, 1, 1, 1, 1, 1, 2, 2));
            break;
        case "actors":
            print_r($database->returnAll("actor"));
            break;
    }
}
