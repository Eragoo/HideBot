<?php

namespace yevheniikukhol\bot\Authorize;


class Authorize
{
    private $id;
    private $usr;
    public function __construct(User $usr)
    {
        $this->id = $usr->id;
        $this->usr = $usr->usr;
    }

    private function validate()
    {

    }
}