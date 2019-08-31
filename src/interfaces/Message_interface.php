<?php


namespace yevheniikukhol\HideBot\interfaces;

 interface Message_interface
{
    public function getChat();
    public function getCommand();
    public function getParams($commands);
}