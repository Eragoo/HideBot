<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "src/classes/DB.php";
require_once "src/classes/UserRegData.php";
require_once "src/classes/Chat.php";

use yevheniikukhol\HideBot\classes\Chat;
use yevheniikukhol\HideBot\classes\DB;
use yevheniikukhol\HideBot\classes\UserRegData;



$db = new DB();

$q = 8;
$res = $db->get('username', "id=$q");
var_dump($res);

echo "<br>";
$array = ['password' => '1452', 'username'=>'user', 'name'=>'user_bot'];
$e = new UserRegData($array);
echo $e->getName();
echo "<br>";
echo $e->getPassword();
echo "<br>";
$s = ['chatId'=>2, 'message'=>'hello'];
$kek = new Chat($s);

echo $kek->getChatId();
echo "<br>";
echo $kek->getMessage();





