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
            $msg = "<b>Введите пароль и в двойных фигурных скобках текст, который хотите скрыть.</b>".PHP_EOL."<i>Пример:</i>".PHP_EOL."<code>password {{текст, который будет помещен в хранилище}}</code>";
            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }else{
            $db = new DB();
            $arr = [];
            preg_match('/(.+){{(.+)}}/', $text, $arr);
            $input_pass = trim($arr[1]);

            $db_get_pass = $db->get('pass', 'chat_id='.$chat_id);
            $db_pass = $db_get_pass[0]['pass'];

            if (hash_equals($db_pass, crypt($input_pass, $db_pass)))
            {
                $hide = convert_uuencode($arr[2]);
                $hide_db = $db->get('hide', 'chat_id='.$chat_id);
                if (empty($hide_db[0]['hide'])){
                    if (!empty($hide)){
                        $res = $db->update('hide', $hide, 'chat_id='.$chat_id);
                        if ($res){
                            $msg = "<i>Поле записано!</i>";
                        }else{
                            $msg = "<i>Произошла занятная ошибка!</i>";
                        }
                    }else{
                        $msg = "<i>Пустое значение не может быть задано!</i>";
                    }
                }else{
                    $msg = "<i>Поле уже задано!</i>";
                }
            }else{
                $msg = "<i>Невереный пароль!</i>";
            }

            $telegram->sendMessage($chat_id, $msg, 'HTML');

        }
    }
}