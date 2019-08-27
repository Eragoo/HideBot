<?php

namespace yevheniikukhol\HideBot\interfaces;

interface DB_interface
{
    public function get(String $select, String $where=null);

    public function getCount($where=null): Int;

    public function write(Array $values);
}