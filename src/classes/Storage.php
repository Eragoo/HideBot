<?php


namespace yevheniikukhol\HideBot\classes;

include ('src/interfaces/Storage_interface.php');


use yevheniikukhol\HideBot\interfaces\Storage_interface;
use yevheniikukhol\HideBot\classes\DB;

class Storage implements Storage_interface
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function storeCommand(int $chat_id, $message)
    {
        $count = $this->db->getCount("chat_id=".$chat_id);

        if (!$count)
        {
            $this->db->write(['chat_id'=>$chat_id, 'message'=>$message]);
        }else{
            $this->db->update('message', $message, 'chat_id='.$chat_id);
        }
    }

    public function restoreCommand(int $chat_id)
    {
        $count = $this->db->getCount("chat_id=".$chat_id);
        if ($count){
            $res = $this->db->get('message', 'chat_id='.$chat_id);
            return $res[0]['message'];
        }else{
            return false;
        }
    }
}

