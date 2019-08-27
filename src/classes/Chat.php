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
    private $chatId;
    private $message;

    public function __construct(Array $array)
    {
        $this->chatId = $array['chatId'];
        $this->message = $array['message'];
    }

    /**
     * @return Int
     */
    public function getChatId(): Int
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
     * @param Int $chatId
     */
    protected function setChatId(Int $chatId)
    {
        $this->chatId = $chatId;
    }

    /**
     * @param mixed $message
     */
    protected function setMessage($message)
    {
        $this->message = $message;
    }
}