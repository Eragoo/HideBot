<?php


namespace yevheniikukhol\HideBot\classes;


require_once ('src/interfaces/Message_interface.php');


use yevheniikukhol\HideBot\interfaces\Message_interface;

class Message implements Message_interface
{

    private $chat_id;
    private $message;
    private $command;

    public function __construct($arr)
    {
        $this->message = $arr['message'];
        $this->chat_id = $arr['chat_id'];
    }

    public function getChat()
    {
        return new Chat($this->chat_id);
    }

    public  function  getCommand(): string
    {
        $arr = [];
        preg_match('/(\/\w*)/', $this->message, $arr);
        $this->command = $arr[1];
        return $this->command;
    }

    public function getParams($command): string
    {
        $command = $this->command;
        $arr = [];
        preg_match('/\/\w+\s(\w+)/', $this->message, $arr);
        return $arr[1];
    }
}