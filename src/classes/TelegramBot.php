<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php');
include('src/commands/StartCommand.php');
include('src/commands/HelpCommand.php');
use Telegram\Bot\Api;
use yevheniikukhol\HideBot\commands\HelpCommand as ApiHelpCommand;
use yevheniikukhol\HideBot\commands\StartCommand;
use yevheniikukhol\HideBot\commands\HelpCommand;

class TelegramBot
{
    const TOKEN = '';
    private static $result;
    private static $telegram;

    public static function start()
    {
        self::createBot();
    }

    private static function getApiObj()
    {
        $telegram = new Api(self::TOKEN);
        $response = $telegram->getMe();
        self::$telegram = $telegram;
    }

    private static function getResult(){
        $result = self::$telegram->getWebhookUpdates();
        self::$result = $result;
    }

    private static function getChatParams()
    {
        $text = self::$result["message"]["text"];
        $chat_id = self::$result["message"]["chat"]["id"];
        return array($text, $chat_id);
    }

    private static function getUserParams()
    {
        $username = self::$result['message']['from']['username'];
    }

    private static function commandLoad()
    {
        $start = new StartCommand();
        $help = new HelpCommand();
        self::$telegram->addCommands([$start, $help]);
    }

    private static function createBot()
    {
        self::getApiObj();
        self::getResult();
        self::commandLoad();
        $update = self::$telegram->commandsHandler(true);

    }



}