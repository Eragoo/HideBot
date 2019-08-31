<?php


namespace yevheniikukhol\HideBot\interfaces;


interface Command_interface
{
    public static function start($telegram, $text);
}