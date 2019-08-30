<?php


namespace yevheniikukhol\HideBot\interfaces;


interface Storage_interface
{
    public function restoreCommand(int $chat_id);
    public function storeCommand(int $chat_id, $command);
}