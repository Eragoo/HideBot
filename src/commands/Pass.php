<?php


namespace yevheniikukhol\HideBot\commands;
require_once ("src/classes/DB.php");

use yevheniikukhol\HideBot\classes\DB;

class Pass extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $answer = '<b>Введите пароль от 3 до 20 символов.</b>';
            $telegram->sendMessage($chat_id, $answer, 'HTML');
        }else{
            $pass = crypt(trim($text));
            $db = new DB();
            $db_pass = $db->get('pass', 'chat_id='.$chat_id);
            if (empty($db_pass[0]['pass'])){
                $res = $db->update('pass', $pass, "chat_id=".$chat_id);
                if ($res){
                    $msg = "<i>Пароль успешно задан!</i>".PHP_EOL."<i>Введите команду</i> /add <i>eсли хотите воспользоваться хранилищем</i>";
                }else{
                    $msg = "<i>Произошла какая-то неведомая ошибка!</i>";
                }
            }else{
                $msg = "<i>Вы не можете задать пароль, так как он уже был задан</i>";
            }
            $telegram->sendMessage($chat_id, $msg, 'HTML');

        }
    }
}