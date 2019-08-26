<?php

require_once "Database/DB.php";

use yevheniikukhol\bot\DB;

$db = new DB;

$res = $db->write(['username'=>'lol', 'name'=>'kek', 'hide'=>'dfvxc']);

var_dump($res);
exit;