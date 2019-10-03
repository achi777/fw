<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("engine","");
require_once engine."lib/config.php";
require_once engine.'lib/init.php';
require_once engine.'lib/router.php';
require_once engine."plugins/plugin_manager.php";
$loader = new router();
$loader->createController();

?>