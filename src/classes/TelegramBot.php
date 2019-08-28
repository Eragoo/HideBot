<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php');
include('src/commands/StartCommand.php');
include('src/commands/HelpCommand.php');
use Telegram\Bot\Api;
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

    private static function getChatParams()
    {
        $text = self::$result["message"]["text"];
        $chat_id = self::$result["message"]["chat"]["id"];
        return ['text'=>$text, 'chat_id'=>$chat_id];
    }

    private static function getUserParams()
    {
        $username = self::$result['message']['from']['username'];
    }

    private static function grabPassword()
    {
        $res = self::getChatParams();
        $text = $res['text'];
        $chat_id = $res['chat_id'];

        $values = [];
        $response = preg_match('/(password|pass):?\s(.+)/i', $text, $values);
        if ($response) {
            $txt = strtolower($values[1]);
            $pass = $values[2];
            if ($txt == 'password' or $txt == 'pass'){
                self::$telegram->sendMessage(['chat_id'=>$chat_id, 'text'=>$pass]);
            }
        }

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
        self::grabPassword();
        $update = self::$telegram->commandsHandler(true);

    }



}