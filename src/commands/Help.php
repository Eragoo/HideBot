<?php


namespace yevheniikukhol\HideBot\commands;
require_once ('src/commands/Command.php');

class Help extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $msg = "Cписок достуных комманд:".PHP_EOL."/start - стартовое сообщение".PHP_EOL."/help - список доступных комманд";
            $telegram->sendMessage($chat_id, $msg);
        }
    }
}