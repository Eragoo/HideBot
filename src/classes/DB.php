<?php
namespace yevheniikukhol\HideBot\classes;

require_once "src/interfaces/DB_interface.php";
use mysql_xdevapi\Exception;
use yevheniikukhol\HideBot\interfaces\DB_interface;


class DB implements DB_interface
{
    private $params = ['values'=>['chat_id', 'command', 'pass', 'hide'], 'table'=>'test'];

    private function getConnection()
    {
        $pdo = new \PDO("mysql:host=localhost;dbname=cm51228_bot", "cm51228_bot", "366326434");
        return $pdo;
    }

    private function checkRes($res, String $str)
    {
        if (!$res){
            throw new \Exception($str);
        }else{
            return true;
        }
    }

    public function write(Array $values)
    {
        $pdo = $this->getConnection();
        $sql = "INSERT INTO {$this->params['table']} ({$this->params['values'][0]}, {$this->params['values'][1]}) VALUE (?,?)";
        $statement = $pdo->prepare($sql);
        $res = $statement->execute([$values[$this->params['values'][0]], $values[$this->params['values'][1]]]);

        $answer = $this->checkRes($res, "Mysql response = FALSE in write() DB class");
        return $answer;
    }

    public function get(String $field, String $where=null)//сделать так, чтоб в where можно было писать "title=lel", а не "title='lel'" c помощью регулярок
    {
        $pdo = $this->getConnection();
        if (!is_null($where)){
            $sql = "SELECT {$field} FROM {$this->params['table']} WHERE {$where}";
        }else{
            $sql = "SELECT {$field} FROM {$this->params['table']}";
        }

        $statement = $pdo->prepare($sql);
        $res = $statement->execute();
        $elem = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $this->checkRes($res, "Mysql response = FALSE in get() DB class");//подставить переменную которая детектит название данного метода
        return $elem;

    }

    public function getCount($where=null): Int //сделать то же самое с регулярками что и в методе get()
    {
        $pdo = $this->getConnection();
        if (!is_null($where)){
            $sql = "SELECT COUNT(*) AS count FROM {$this->params['table']} WHERE {$where}";
        }else{
            $sql = "SELECT COUNT(*) AS count FROM {$this->params['table']}";

        }

        $statement = $pdo->prepare($sql);
        $res = $statement->execute();
        $count = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $this->checkRes($res, "Mysql response = FALSE in getCount() DB class");
        return $count[0]['count'];
    }


    public function update(string $field, $value, string $where)
    {

        $sql = "UPDATE {$this->params['table']} SET {$field}=?  WHERE {$where}";
        $pdo = $this->getConnection();
        $statement = $pdo->prepare($sql);
        $res = $statement->execute([$value]);

        $answer = $this->checkRes($res, "Mysql response = FALSE in update() DB class");
        return $answer;
    }

    public function delete(string $where)
    {
        $sql = "DELETE FROM {$this->params['table']} WHERE {$where}";
        $pdo = $this->getConnection();
        $statement = $pdo->prepare($sql);
        $res = $statement->execute();
        $answer = $this->checkRes($res, "Mysql response = FALSE in delete() DB class");
        return $answer;
    }
}



