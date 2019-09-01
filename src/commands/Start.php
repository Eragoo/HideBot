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
            $msg = "<b>Приветствую, $name!".PHP_EOL.
                "Я бот, что сохранит Ваши данные под паролем внутри Telegram.".PHP_EOL.
                "Для начала необходимо задать пароль, который Вы будете вводить каждый раз для получения доступа к содержимому своего сейфа, сделать это можно с помощью комманды</b> ".PHP_EOL."/pass".PHP_EOL.
                "<b>Позже Вам необходимо задать данные которые будут хранится в сейфе(пока что только текст), для этого воспользуйтесь коммандой</b> ".PHP_EOL."/add".PHP_EOL.
                "<b>И наконец, чтобы получить доступ к данным введите команду</b> ".PHP_EOL."/view".PHP_EOL.
                "<b>Чтобы получить полный список комманд введите</b> /help".PHP_EOL;
            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }
    }
}