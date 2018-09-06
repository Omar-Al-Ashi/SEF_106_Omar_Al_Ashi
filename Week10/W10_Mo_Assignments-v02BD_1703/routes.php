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

/*
Now, $routes will contain all the routes. $routes[0] will correspond to first route.
For e.g. in above example $routes[0] is search, $routes[1] is book and $routes[2] is fitzgerald
*/

switch ($routes[1]) {
    case "customers":
        print_r($database->returnAllCustomers());
}

//TODO we should return rather than print
//if ($routes[1] == "GET") {
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // The request is using the POST method
    if ($routes[1] == "customers") {
        print_r($database->returnAll("customer"));
    } elseif ($routes[1] == "addresses") {
        print_r($database->returnAll("address"));
    } elseif ($routes[1] == "films") {
        print_r($database->returnAll("film"));
    } elseif ($routes[1] == "actors") {
        print_r($database->returnAll("actor"));
    }
}

