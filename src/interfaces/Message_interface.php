<?php


namespace yevheniikukhol\HideBot\interfaces;

 interface Message_interface
{
    public function getChat();
    public function getCommand(): string ;
    public function getParams($commands): string ;
}