<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php'); //Подключаем библиотеку
use Telegram\Bot\Api;


class TelegramGetFactory
{
    const TOKEN = '';
    private static $result;
    private static $telegram;

    private static function getApiObj()
    {
        $telegram = new Api(self::TOKEN);
        self::$telegram = $telegram;
    }

    private static function getResult(){
        $result = self::$telegram -> getWebhookUpdates();
        self::$result = $result;
    }

    private static function getChatParams(){
        $text = self::$result["message"]["text"];
        $chat_id = self::$result["message"]["chat"]["id"];
        return array($text, $chat_id);
    }

    private static function getUserParams(){
        $username = self::$result['message']['from']['username'];
    }

    public static function sendTestMessage(){
        self::getApiObj();
        self::getResult();
        list($text, $chat_id) = self::getChatParams();
        if ($text){
            self::$telegram->sendMessage(['chat_id'=>$chat_id, 'text'=>$text]);
        }
    }


}