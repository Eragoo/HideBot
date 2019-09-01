<?php


namespace yevheniikukhol\HideBot\commands;
require_once ('src/commands/Command.php');
require_once ('src/classes/DB.php');

use yevheniikukhol\HideBot\classes\DB;

class SetHide extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $msg = "<b>Введите текст, который хотите сохранить</b>";
            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }else {
            $db = new DB();
            $hide = convert_uuencode($text);
            $hide_db = $db->get('hide', 'chat_id=' . $chat_id);
            if (empty($hide_db[0]['hide'])) {
                if (!empty($hide)) {
                    $res = $db->update('hide', $hide, 'chat_id=' . $chat_id);
                    if ($res) {
                        $msg = "<i>Поле записано!</i>";
                    } else {
                        $msg = "<i>Произошла занятная ошибка!</i>";
                    }
                } else {
                    $msg = "<i>Пустое значение не может быть задано!</i>";
                }
            } else {
                $msg = "<i>Поле уже задано!</i>";
            }

            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }

    }
}