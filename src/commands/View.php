<?php


namespace yevheniikukhol\HideBot\commands;
require_once ('src/commands/Command.php');
require_once ('src/classes/DB.php');
use yevheniikukhol\HideBot\classes\DB;

class View extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $msg = 'Введите пароль.';
            $telegram->sendMessage($chat_id, $msg);
        }else{
            $db = new DB();
            $db_get_pass = $db->get('pass', 'chat_id='.$chat_id);
            $db_pass = $db_get_pass[0]['pass'];
            $input_pass = $text;
            if (hash_equals($db_pass, crypt($input_pass, $db_pass)))
            {
                $hide = $db->get('hide', 'chat_id='.$chat_id);
                $msg = convert_uudecode($hide[0]['hide']);
            }else{
                $msg = "Неверный пароль.";
            }

            $telegram->sendMessage($chat_id, $msg);
        }
    }
}