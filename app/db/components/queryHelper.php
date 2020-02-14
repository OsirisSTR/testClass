<?php
namespace App\db\components;

class queryHelper
{
    public function __construct()
    {
        $config = require_once __DIR__ . "/../../../config.php";
        $this ->pdo=Connection::make($config);
    }

    public function getAll($table)
    {
        $sql="select * from $table";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOne($table,$id,$search="id")
    {
        $sql="select * from $table where $search = :x";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute(["x"=>$id]);
        return $stmt->fetch();
    }

    public function delete($table,$id,$search="id")
    {
        $sql="delete from $table where $search = :x";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute(["x"=>$id]);
        return $stmt->fetch();
    }

    public function store($table, $data)
    {
        $f = array_keys($data);
        $fields = implode(', ', $f);
        $values = '.' . implode(', ', $f);
        $sql = "insert into $table($fields) value($values)";
        $stmt = $this->pdo->prepare($sql);
        $sql->execute($data);
    }

    public function update($table,$data,$search="id")
    {
        $fields="";
        foreach($data as $key=>$value)
        {
            if ($key!=$search){
                $fields.=$key."=:".$key.",";
            }
        }
        $fields=rtrim($fields,",");
        $sql="update $table set $fields where $search=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
    }
}