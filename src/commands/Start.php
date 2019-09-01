<?php


namespace yevheniikukhol\HideBot\commands;

require_once ('src/commands/Command.php');

class Start extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $name = $telegram->getUser()->getName();
            $msg = "Привет, $name!".PHP_EOL.
                "Я бот, что сохранит твои данные под паролем внутри телеграма.".PHP_EOL.
                "Для начала необходимо задать пароль, который ты будешь вводить каждый раз для получения доступа к содержимому своего сейфа, сделать это можно с помощью комманды /setPassword".PHP_EOL.
                "Потом тебе необходимо задать данные которые будут хранится в сейфе(пока что только текст), для этого воспользуйся коммандой /setHide".PHP_EOL.
                "И наконец, чтобы получить доступ к данным введи команду /view".PHP_EOL.
                "Чтобы получить полный список комманд введи /help".PHP_EOL;
            $telegram->sendMessage($chat_id, $msg);
        }
    }
}