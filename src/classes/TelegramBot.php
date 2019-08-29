<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php');
include('src/commands/StartCommand.php');
include('src/commands/HelpCommand.php');
include ('src/classes/Logging.php');
use Telegram\Bot\Api;
use yevheniikukhol\HideBot\classes\Logging as Logs;
use yevheniikukhol\HideBot\commands\StartCommand;
use yevheniikukhol\HideBot\commands\HelpCommand;

class TelegramBot
{
    const TOKEN = '';
    private static $result;
    private static $telegram;
    private static $chat_params;

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

    private static function getResult()
    {
        $result = self::$telegram->getWebhookUpdates();
        self::$result = $result;
    }

    private static function getChatParams() : array
    {
        $text = self::$result["message"]["text"];
        $chat_id = self::$result["message"]["chat"]["id"];
        return ['text'=>$text, 'chat_id'=>$chat_id];
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

    private static function startLogging()
    {
        $response = self::getChatParams();
        $message = $response['text'];
        if ($message){
            Logs::start($message);
        }
    }

    private static function createBot()
    {
        self::getApiObj();
        self::getResult();
        self::commandLoad();
        self::startLogging();
        self::grabPassword();
        $update = self::$telegram->commandsHandler(true);

    }



}