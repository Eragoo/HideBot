<?php
namespace yevheniikukhol\HideBot\commands;

class Def extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $name = $telegram->getUser()->getName();
            $telegram->sendMessage($chat_id, "$name, Вы вызвали дефолтную комманду");
        }else{
            $answer = "Зачем вы мне написали - ". $text;
            $telegram->sendMessage($chat_id, $answer);

        }
    }
}