<?php

namespace yevheniikukhol\HideBot\classes;

class User
{
  private $id;
  private $username;
  private $name;

  public function __construct($id, $username, $name)
  {
      $this->id = $id;
      $this->username = $username;
      $this->name = $name;
  }

  public function getId()
  {
      return $this->id;
  }

  public function getUsername(): string
  {
      return $this->username;
  }

  public function getName(): string
  {
      return $this->name;
  }

}

