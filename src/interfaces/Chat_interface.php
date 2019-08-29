<?php


namespace yevheniikukhol\HideBot\interfaces;


interface Chat_interface
{
    public function getChat_id(): Int;
    public function getMessage(): String;
}