<?php


namespace yevheniikukhol\HideBot\commands;
require_once ("src/commands/SetPassword.php");
require_once ("src/classes/DB.php");

use yevheniikukhol\HideBot\classes\DB;

class SetPassword extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $answer = 'Введи пароль от 3 до 20 символов.';
            $telegram->sendMessage($chat_id, $answer);
        }else{
            $pass = password_hash($text, PASSWORD_DEFAULT);
            $db = new DB();
            $db_pass = $db->get('pass', 'chat_id='.$chat_id);
            if (empty($db_pass[0]['pass'])){
                $res = $db->update('pass', $pass, "chat_id=".$chat_id);
                if ($res){
                    $msg = "Пароль успешно задан!";
                }else{
                    $msg = "Произошла какая-то неведомая ошибка!";
                }
            }else{
                $msg = "Вы не можете задать пароль, так как он уже был задан.";
            }
            $telegram->sendMessage($chat_id, $msg);

        }
    }
}