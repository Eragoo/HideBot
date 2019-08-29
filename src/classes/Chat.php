<?php


namespace yevheniikukhol\HideBot\classes;
require_once "src/interfaces/Chat_interface.php";

use yevheniikukhol\HideBot\interfaces\Chat_interface;

/**
 * Class Chat
 * @package yevheniikukhol\HideBot\classes
 * Used for keeping info about chat
 */

class Chat implements Chat_interface
{
    private $chat_id;
    private $message;

    public function __construct(Array $array)
    {
        $this->chat_id = $array['chat_id'];
        $this->message = $array['message'];
    }

    /**
     * @return Int
     */
    public function getChat_id(): Int
    {
        return $this->chatId;
    }

    /**
     * @return String
     */
    public function getMessage(): String
    {
        return $this->message;
    }

    /**
     * @param Int $chat_id
     */
    protected function setChat_id(Int $chat_id)
    {
        $this->chat_id = $chat_id;
    }

    /**
     * @param mixed $message
     */
    protected function setMessage($message)
    {
        $this->message = $message;
    }
}