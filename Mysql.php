<?php


use exam_2\database;

require_once "database.php";

class mysql implements database{

    private $connect;

    public function __construct($hostname,$username,$password,$DBname)
    {
        $this->connect = mysqli_connect($hostname,$username,$password,$DBname);
    }

    public function selectAll($column,$table){
        $query = "SELECT $column FROM $table";
        $result = mysqli_query( $this->connect,$query);
        if(mysqli_num_rows($result)>0){
            return  mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }


    public function selectWhere($column,$table,$condition,$value){
        $query = "SELECT * FROM products WHERE $condition $value";
        $result = mysqli_query( $this->connect,$query);

        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[]= $row;
        }
        return $data;
    }


    public function selectOne($column,$table,$condition,$value){
        $query = "SELECT $column FROM $table WHERE $condition $value";
        var_dump($query);
        $result = mysqli_query( $this->connect,$query);
        if(mysqli_num_rows($result)>0){
            return  mysqli_fetch_Assoc($result,MYSQLI_ASSOC);
        }
    } 


    public function Insert($column,$table,$value){
        $query = "INSERT INTO $table ($column) VALUES ($value)";
        $result = mysqli_query( $this->connect,$query);
        if($result)
        {
            echo "inserted successfully";
        }else{
            echo "not inserted successfully";
        }
    }
    public function Update($table,$oldData,$newData,$condition,$value){
        $query = "UPDATE $table SET $oldData = $newData WHERE $condition $value";
        $result = mysqli_query( $this->connect,$query);
        if($result)
        {
            echo "updated successfully";
        }else{
            echo "not updated successfully";
        }
    }


    public function Delete($table,$condition,$value){
        $query = "DELETE FROM $table WHERE $condition $value";
        $result = mysqli_query( $this->connect,$query);
        if($result)
        {
            echo "DELETED successfully";
        }else{
            echo "not DELETED successfully";
        }
    }



}

$myDB = new mysql('localhost','root','','e_shop');

// print_r($myDB->selectWhere('name,email,password,role,','users')condition - value));
// print_r($myDB->selectOne('name,email,password,role,','users')condition - value));
// print_r($myDB->INSERT('name,email,password,role,','users');
// print_r($myDB->UPDATE("products","email,password,role,','users')condition - value);
// print_r($myDB->DELETE("orders"condition - value);