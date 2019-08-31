<?php


namespace yevheniikukhol\HideBot\classes;
include ('src/commands/Helpi.php');
include ('src/commands/Def.php');

use yevheniikukhol\HideBot\commands\Helpi;
use yevheniikukhol\HideBot\commands\Def;


class Commands
{
    public static function chooseCommand($command, $telegram, $text)
    {
        switch ($command){
            case '/helpi':
                Helpi::start($telegram, $text);
                break;

            default:
                Def::start($telegram, $text);
        }
    }
}