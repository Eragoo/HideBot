<?php


namespace yevheniikukhol\HideBot\commands;
require_once ('src/commands/Command.php');
require_once ('src/classes/DB.php');
use yevheniikukhol\HideBot\classes\DB;

class Add extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $msg = "<b>Введите текст, который хотите добавить</b>";
            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }else {
            $db = new DB();
            $hide_db = $db->get('hide', 'chat_id=' . $chat_id);
            if (!empty($text)) {
                $hide_db = convert_uudecode($hide_db[0]['hide']);
                $hide = $hide_db . PHP_EOL . $text;
                $hide = convert_uuencode($hide);
                $res = $db->update('hide', $hide, 'chat_id=' . $chat_id);
                if ($res) {
                    $msg = "<i>Изменения записаны!</i>";
                } else {
                    $msg = "<i>Произошла занятная ошибка!</i>";
                }
            }else {
                $msg = "<i>Я не могу записать пустые изменения!</i>";
            }

            $telegram->sendMessage($chat_id, $msg, 'HTML');
            }



    }
}