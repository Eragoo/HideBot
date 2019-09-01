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
            $msg = "Введите пароль и в двойных фигурных скобках текст, который хотите скрыть.".PHP_EOL."Например:".PHP_EOL."password {{текст, который будет помещен в хранилище}}";
            $telegram->sendMessage($chat_id, $msg);
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
                            $msg = "Поле записано!";
                        }else{
                            $msg = "Произошла занятная ошибка!";
                        }
                    }else{
                        $msg = "Пустое значение не может быть задано!";
                    }
                }else{
                    $msg = "Поле уже задано!";
                }
            }else{
                $msg = "Невереный пароль";
            }

            $telegram->sendMessage($chat_id, $msg);

        }
    }
}