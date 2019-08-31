<?php


namespace yevheniikukhol\HideBot\commands;


abstract class Command
{
    abstract public static function start($telegram, $text);
}