<?php
namespace yevheniikukhol\HideBot\commands;

require_once ('src/commands/Command.php');

class Def extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $msg = "Я не знаю как реагировать на такое :(".PHP_EOL."Введи /help чтобы узнать список доступных комманд!";
            $telegram->sendMessage($chat_id, $msg);
        }
    }
}