<?php


namespace yevheniikukhol\HideBot\interfaces;


interface UserRegData_interface
{
    public function getUsername(): String;
    public function setUsername(String $username);

    public function getName(): String;
    public function setName(String $name);

    public function getPassword(): String;
    public function setPassword(String $password);


}