<?php


namespace yevheniikukhol\HideBot\classes;

class Logging
{
    public static function start(string $message)//возможно они будут затираться при одновременном использовании двумя юзерами
    {
        if (substr($message, 0, 1) == '/' ){
            $handle = fopen("src/logs/logs.txt", "w+");
            fwrite($handle, $message);
            fclose($handle);
        }
    }
}