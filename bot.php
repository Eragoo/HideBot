<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "src/classes/DB.php";

$db = new DB();

$q = 1;
$res = $db->get('username', "id=$q");
var_dump($res);