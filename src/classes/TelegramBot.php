<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php');
include ('src/classes/Chat.php');
include ('src/classes/Message.php');
include ('src/classes/User.php');

use Telegram\Bot\Api;

class TelegramBot
{
    const TOKEN = '';
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
        $message = $this->result->getMessage()['text'];
        $chat_id = $this->result->getMessage()['chat']['id'];
        return new Message(['chat_id'=>$chat_id, 'message'=>$message]);
    }

    public  function  sendMessage($chat_id, $answer, $reply='')
    {
        $this->telegram->sendMessage(['chat_id'=>$chat_id, 'text'=>$answer, 'parse_mode'=>$reply]);
    }

    public function getUser(): User
    {
        $id = $this->result['message']['from']['id'];
        $username = $this->result["message"]["from"]["username"];
        $name = $this->result["message"]["from"]["first_name"];
        return new User($id, $username, $name);
    }

}
