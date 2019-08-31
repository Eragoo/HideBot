<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php');

use Telegram\Bot\Api;

class TelegramBot
{
    const TOKEN = '658687388:AAEddwfHFShJrFtlcV5r9b0WYEXzijCG-ec';
    private $telegram;
    private $result;

    public function __construct()
    {
        $this->loadBot();
        $this->getWhUpdates();
    }

    private function loadBot()
    {
        $telegram = new Api(self::TOKEN);
        $this->telegram = $telegram;
    }

    private function getWhUpdates()
    {
        $result = $this->telegram->getWebhookUpdates();
        $this->result = $result;
    }


    public function getMessage(): Message
    {
        $message = $this->result['message']['text'] ?? '';
        $chat_id = $this->result['message']['chat']['id'] ?? 0;
        return new Message(['chat_id'=>$chat_id, 'message'=>$message]);
    }

    public  function  sendMessage($chat_id, $answer)
    {
        $this->telegram->sendMessage(['chat_id'=>$chat_id, 'text'=>$answer]);

    }

    public function getUser(): User
    {
        $id = $this->result['message']['from']['id'] ?? 0;
        $username = $this->result["message"]["from"]["username"] ?? '';
        $name = $this->result["message"]["from"]["first_name"] ?? '';
        return new User($id, $username, $name);
    }

}