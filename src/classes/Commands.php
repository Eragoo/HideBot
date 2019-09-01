<?php


namespace yevheniikukhol\HideBot\classes;
include ('src/commands/Helpi.php');
include ('src/commands/Def.php');
require_once ('src/commands/Start.php');
require_once ('src/commands/Help.php');
require_once ('src/commands/Pass.php');
require_once ('src/commands/SetHide.php');
require_once ('src/commands/View.php');
require_once ('src/commands/Reset.php');
require_once ('src/commands/Add.php');

use yevheniikukhol\HideBot\commands\Helpi;
use yevheniikukhol\HideBot\commands\Def;
use yevheniikukhol\HideBot\commands\SetHide;
use yevheniikukhol\HideBot\commands\Start;
use yevheniikukhol\HideBot\commands\Help;
use yevheniikukhol\HideBot\commands\Pass;
use yevheniikukhol\HideBot\commands\View;
use yevheniikukhol\HideBot\commands\Reset;
use yevheniikukhol\HideBot\commands\Add;

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

            case "/pass":
                Pass::start($telegram, $text);
                break;

            case "/setHide":
                SetHide::start($telegram, $text);
                break;

            case '/view':
                View::start($telegram, $text);
                break;

            case '/reset':
                Reset::start($telegram, $text);
                break;

            case '/add':
                Add::start($telegram, $text);
                break;

            default:
                Def::start($telegram, $text);
        }
    }
}