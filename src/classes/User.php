<?php

namespace yevheniikukhol\HideBot\classes;

class User
{
    static $username;
    static $name;

    static function setUsername(String $username)
    {
        self::$username = $username;
    }

    static function setName(String $name)
    {
        self::$name = $name;
    }

    static function getUsername(): String
    {
        return self::$username;
    }

    static function getName(): String
    {
        return self::$name;
    }
}

