<?php

namespace yevheniikukhol\bot\DB;

class DB
{
    private $params = ['values'=>['username', 'name', 'hide'], 'table'=>'users'];

    private function getConnection()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=cm51228_bot", "cm51228_bot", "366326434");
        return $pdo;
    }

    private function checkRes($res, $str)
    {
        if (!$res){
            throw new Exception($str);
        }
    }

    public function write($values)
    {
        $pdo = $this->getConnection();
        $sql = "INSERT INTO {$this->params['table']} ({$this->params['values'][0]}, {$this->params['values'][1]}, {$this->params['values'][2]}) VALUE (:{$this->params['values'][0]}, :{$this->params['values'][1]}, :{$this->params['values'][2]})";
        $statement = $pdo->prepare($sql);
        foreach ($this->params['values'] as $key=>$value){
            $statement->bindParam(":{$value}", $values["{$value}"]);
        }
        $res = $statement->execute();

        $this->checkRes($res, "Mysql response = FALSE in write() DB class");
        return $res;
    }

    public function get($select, $where=null)//сделать так, чтоб в where можно было писать "title=lel", а не "title='lel'" c помощью регулярок
    {
        $pdo = $this->getConnection();
        $sql = "SELECT {$select} FROM {$this->params['table']}";
        if (!is_null($where)){
            $sql = "SELECT {$select} FROM {$this->params['table']} WHERE {$where}";
        }

        $statement = $pdo->prepare($sql);
        $res = $statement->execute();
        $elem = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->checkRes($res, "Mysql response = FALSE in get() DB class");//подставить переменную которая детектит название данного метода
        return $elem;

    }

    public function getCount($where=null)//сделать то же самое с регулярками что и в методе get()
    {
        $pdo = $this->getConnection();
        $sql = "SELECT COUNT(*) AS count FROM {$this->params['table']}";
        if (!is_null($where)){
            $sql = "SELECT COUNT(*) AS count FROM {$this->params['table']} WHERE {$where}";
        }

        $statement = $pdo->prepare($sql);
        $res = $statement->execute();
        $count = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->checkRes($res, "Mysql response = FALSE in getCount() DB class");
        return $count[0]['count'];
    }

}



