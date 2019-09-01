<?php


namespace yevheniikukhol\HideBot\commands;
use yevheniikukhol\HideBot\classes\DB;

require_once ('src/commands/Command.php');
require_once ('src/classes/DB.php');

class Reset extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $msg = "<b>Введите пароль чтобы удалить все данные</b>";
            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }else{
            $db = new DB();
            $db_get_pass = $db->get('pass', 'chat_id='.$chat_id);
            $db_pass = $db_get_pass[0]['pass'];
            $input_pass = $text;
            if (hash_equals($db_pass, crypt($input_pass, $db_pass)))
            {
                $res = $db->delete('chat_id='.$chat_id);
                if ($res){
                    $msg = "<i>Данные успешно удалены</i>";
                }else{
                    $msg = "<i>Ошибка удаления</i>";
                }
            }else{
                $msg = "<i>Неверный пароль</i>";
            }

            $telegram->sendMessage($chat_id, $msg, 'HTML');
        }
    }
}