<?php


namespace yevheniikukhol\HideBot\classes;
require_once "src/interfaces/UserRegData_interface.php";
use yevheniikukhol\HideBot\interfaces\UserRegData_interface;

/**
 * Class UserRegData
 * @package yevheniikukhol\HideBot\classes
 * used for keep user type-data and next compare it with user data from database
 */

class UserRegData
{
    private $username;
    private $password;
    private $name;

    public function __construct(Array $array)
    {
        $this->username = $array['username'];
        $this->name = $array['name'];
        $this->password = $array['password'];
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @return String
     */
    public function getPassword(): String
    {
        return $this->password;
    }

    /**
     * @return String
     */
    public function getUsername(): String
    {
        return $this->username;
    }


    /**
     * @param String $name
     */
    protected function setName(String $name)
    {
        $this->name = $name;
    }

    /**
     * @param String $password
     */
    protected function setPassword(String $password)
    {
        $this->password = $password;
    }

    /**
     * @param String $username
     */
    protected function setUsername(String $username)
    {
        $this->username = $username;
    }
}
