<?php

namespace yevheniikukhol\HideBot\classes;
/**
 * Class User
 * @package yevheniikukhol\HideBot\classes
 * here keeps user data from database after comparing with user type data
 */
class User
{
    private $username;
    private $name;

    public function setUsername(String $username)
    {
        self::$username = $username;
    }

    public function setName(String $name)
    {
        self::$name = $name;
    }

    public function getUsername(): String
    {
        return self::$username;
    }

    public function getName(): String
    {
        return self::$name;
    }
}

