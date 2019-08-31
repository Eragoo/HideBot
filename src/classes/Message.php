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

    public  function  getCommand()
    {   $message = $this->message;
        $arr = explode(' ', $message);
        if (substr($arr[0], 0, 1) == '/'){
            $this->command = $arr[0];
        }else{
            $this->command = false;
        }

        return $this->command;
    }

    public function getParams($command)
    {
        $message = $this->message;
        if (substr($message, 0, 1) != '/'){
            return $message;
        }else{
            return false;
        }
    }
}
