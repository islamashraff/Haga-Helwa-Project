<?php
require_once 'validate.php';
include "Mysql.php";

class login
{
    private $dbConnection;


    public function __construct(){
        $this->setDbConnection();
    }


    public function validateData(){
    
        $userValidator = new UserValidator($_POST);
        $errors = $userValidator->validateForm();

        if ($errors) {
            return $errors;
        }

        $this->login($_POST['email'], $_POST['password']);
    }

    private function login ($email, $password) {
        $res = mysqli_query($this->dbConnection, "SELECT * FROM users WHERE email = '".$email."' AND password = '".md5($password)."'");  
        // $user = $this->dbConnection->selectOne("*", "users", "email =", "$email");
        if($user) {
            var_dump('dassda');
        }  
    }

    private function setDbConnection()
    {
        $this->dbConnection = new mysql('localhost', 'root', '', 'e_shop');
    }
}

