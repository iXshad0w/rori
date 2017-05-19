<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


define("__ROOT__", __DIR__."/");
define("__CACHE__", __ROOT__."App/cache/");
define("__VIEWS__", __ROOT__."views/");

require_once "App/Autoloader.php";
require_once "routes.php";
