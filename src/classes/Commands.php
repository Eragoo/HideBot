<?php


namespace yevheniikukhol\HideBot\classes;
include ('src/commands/Helpi.php');

use yevheniikukhol\HideBot\commands\Helpi;


class Commands
{
    public static function chooseCommand($command, $telegram, $text)
    {
        switch ($command){
            case '/helpi':
                Helpi::start($telegram, $text);
                break;
        }
    }
}