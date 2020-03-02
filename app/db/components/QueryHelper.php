<?php


class QueryHelper
{
    public $pdo;
    function __construct()
    {
        $config= require_once __DIR__ . "../../../config.php";
        $this->pdo=connection::make($config);
    }
    public function getAll($table)
    {
        $sql="Select * from $table";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $res=$stmt->fetchAll();
        return $res;
    }
    public function getRow($table,$id)
    {
        $sql = prepare("Select * from $table where $search=:x");
        $stmt = $this->pdo->prepare($sql);
        if ($stmt->execute(["x" => $id])) {
            return $stmt->fetch();
        };
    }
    public function DeleteRow($table,$id,$search="id")
    {
        $sql="Delete from $table where $serach=:x";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute(["x"=>$id]);
    }
    public function insertRow($table,$data)
    {
        $f=array_keys($data);
        $fields=implode(",", $f);
        $values=implode(", :", $f);
        $sql="insert into $table($fields)values($values)";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    public function updateRow($table,$data)
    {
        $fields="";
        foreach($data as $key => $value)
        {
            if($key!= $search){$fields.=$key.="=:".$key.=",";}
            $fields=rtrim($fields,",");
        }
            $sql="Update $table set $fields where $search=:x";
    }
}