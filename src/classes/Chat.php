<?php


namespace yevheniikukhol\HideBot\classes;
require_once "src/interfaces/Chat_interface.php";

use yevheniikukhol\HideBot\interfaces\Chat_interface;


class Chat implements Chat_interface
{
    private $chat_id;

    public function __construct($chat_id)
    {
        $this->chat_id = $chat_id;
    }
    public function getId(): Int
    {
        return $this->chat_id;
    }


 }