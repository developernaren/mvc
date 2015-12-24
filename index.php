<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function rootPath() {
    return __DIR__;
}


require_once( "vendor/autoload.php");

use Framework\Routes\Route;



//\App\Routes\Route::get("naren", "sdfsdf");
//\App\Routes\Route::get("naren1",'sdfsdf');
//\App\Routes\Route::get("sdf",'sdfsdf');
Route::get("/hello",'\App\Controllers\Controller@index');
Route::get("/article/{num}/edit",'\App\Controllers\Controller@edit');

//\App\Routes\Route::post("nasdfsdfren", "sdfsdfsfd");

$route = new Route();
echo $route->execute();

