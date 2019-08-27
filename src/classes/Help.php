<?php


namespace yevheniikukhol\HideBot\classes;
require_once "src/classes/Command.php";
use yevheniikukhol\HideBot\classes\Command;

class Help extends Command
{
    public static function run()
    {
        echo 'hello world';
    }
}