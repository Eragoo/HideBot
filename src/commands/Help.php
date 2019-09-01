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
            $msg = "<b>Cписок достуных комманд:</b>".PHP_EOL."/start - <i>стартовое сообщение</i>".PHP_EOL."/setPassword - <i>задать пароль от хранилища</i>".PHP_EOL."/setHide - <i>задать данные, которые будут сохранены в хранилище</i>".PHP_EOL."/view - <i>получить данные из хранилища</i>".PHP_EOL."/reset - <i>сбросить пароль и хранимые данные</i>".PHP_EOL."/help - <i>список доступных комманд</i>";
            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }
    }
}