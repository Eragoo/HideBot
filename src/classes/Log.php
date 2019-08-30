<?php


namespace yevheniikukhol\HideBot\classes;

class Log
{
    private static $msg;

    public static function write(string $message)//возможно они будут затираться при одновременном использовании двумя юзерами
    {
        if (substr($message, 0, 1) == '/' ){
            $handle = fopen("src/logs/logs.txt", "w+");
            fwrite($handle, $message);
            fclose($handle);
        }
    }

    public static function get(): string
    {
        $handle = fopen("src/logs/logs.txt", "r");
        $response = fgets($handle);
        fclose($handle);
        return $response;
    }
}