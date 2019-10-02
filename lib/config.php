<?php
/*Globa config*/
session_start();
ob_start();
date_default_timezone_set("Asia/Tbilisi");

/*Domain config*/
define('domain','http://localhost');
define('path','/fw');
define('baseurl',domain.path);

/*db config*/
define('dbHost','localhost');
define('dbUser','root');
define('dbPass','');
define('dbName','satesto');
