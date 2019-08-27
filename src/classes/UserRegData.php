<?php


namespace yevheniikukhol\HideBot\classes;
use yevheniikukhol\HideBot\interfaces\UserRegData_interface;
require_once "src/interfaces/UserRegData_interface.php";


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
    public function setName(String $name)
    {
        $this->name = $name;
    }

    /**
     * @param String $password
     */
    public function setPassword(String $password)
    {
        $this->password = $password;
    }

    /**
     * @param String $username
     */
    public function setUsername(String $username)
    {
        $this->username = $username;
    }
}
