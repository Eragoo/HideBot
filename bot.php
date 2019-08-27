<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "src/classes/TelegramGetFactory.php";

use yevheniikukhol\HideBot\classes\TelegramGetFactory;

TelegramGetFactory::sendTestMessage();

