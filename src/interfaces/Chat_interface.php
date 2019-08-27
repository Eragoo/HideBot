<?php


namespace yevheniikukhol\HideBot\interfaces;


interface Chat_interface
{
    public function getChatId(): Int;
    public function getMessage();
}