<?php


namespace yevheniikukhol\HideBot\classes;
include ('src/commands/Helpi.php');
include ('src/commands/Def.php');
require_once ('src/commands/Start.php');
require_once ('src/commands/Help.php');
require_once ('src/commands/SetPassword.php');
require_once ('src/commands/SetHide.php');

use yevheniikukhol\HideBot\commands\Helpi;
use yevheniikukhol\HideBot\commands\Def;
use yevheniikukhol\HideBot\commands\SetHide;
use yevheniikukhol\HideBot\commands\Start;
use yevheniikukhol\HideBot\commands\Help;
use yevheniikukhol\HideBot\commands\SetPassword;

class Commands
{
    public static function chooseCommand($command, $telegram, $text)
    {
        switch ($command){
            case '/helpi':
                Helpi::start($telegram, $text);
                break;

            case '/start':
                Start::start($telegram, $text);
                break;

            case '/help':
                Help::start($telegram, $text);
                break;

            case "/setPassword":
                SetPassword::start($telegram, $text);
                break;

            case "/setHide":
                SetHide::start($telegram, $text);
                break;

            default:
                Def::start($telegram, $text);
        }
    }
}