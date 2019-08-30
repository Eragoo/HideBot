<?php


namespace yevheniikukhol\HideBot\classes;
include('vendor/autoload.php');

use Telegram\Bot\Api;

class Telegram
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

    protected function getWhUpdates()
    {
        $result = $this->telegram->getWebhookUpdates();
        self::$result = $result;
    }


    public function getMessage(): Message
    {
        $message = $this->result["message"]["text"] ?? '';
        $chat_id = $this->result["message"]["chat"]["id"] ?? 0;
        return new Message(['chat_id'=>$chat_id, 'message'=>$message]);
    }


}