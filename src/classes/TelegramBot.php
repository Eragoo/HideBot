<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php');
include('src/commands/StartCommand.php');
include('src/commands/HelpCommand.php');
include ('src/commands/GetLogCommand.php');
include ('src/classes/Log.php');
include ('src/classes/Chat.php');

use Telegram\Bot\Api;

use yevheniikukhol\HideBot\commands\StartCommand;
use yevheniikukhol\HideBot\commands\HelpCommand;
use yevheniikukhol\HideBot\commands\GetLogCommand;
use yevheniikukhol\HideBot\classes\Log;


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

    private static function startApi()
    {
        $telegram = new Api(self::TOKEN);
        $response = $telegram->getMe();
        self::$telegram = $telegram;
    }

    private static function getWhUpdates()
    {
        $result = self::$telegram->getWebhookUpdates();
        self::$result = $result;
    }

    private static function getChat(): Chat
    {
        $message = self::$result["message"]["text"] ?? '';
        $chat_id = self::$result["message"]["chat"]["id"] ?? 0;
        return new Chat(['chat_id'=>$chat_id, 'message'=>$message]);
    }

    private static function getUserParams()
    {
        $username = self::$result['message']['from']['username'];
    }

    private static function commandLoad()
    {
        $start = new StartCommand();
        $help = new HelpCommand();
        $getLog = new GetLogCommand();
        self::$telegram->addCommands([$start, $help, $getLog]);
        self::$telegram->commandsHandler(true);
    }

    private static function startLogging()
    {
        $chat = self::getChat();
        $message = $chat->getMessage();
        if ($message){
            Log::write($message);
        }
    }

    private static function createBot()
    {
        self::startApi();
        self::getWhUpdates();
        self::startLogging();
        self::commandLoad();
    }



}