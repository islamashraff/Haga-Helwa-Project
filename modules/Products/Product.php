<?php

include "Mysql.php";

class Product
{
    private $dbConnection;

    public function __construct()
    {
        $this->setDbConnection();
    }

    public function getFeaturedProducts()
    {

        return $this->dbConnection->selectWhere("*", "products", "featured=", "1");
    }

    public function getProduct($id)
    {
        return $this->dbConnection->selectWhere("*", "products", "id = ", $id);
    }

    public function getNewArrival()
    {

        return $this->dbConnection->selectWhere("*", "products", "new_arrival=", "1");
    }

    private function setDbConnection()
    {
        $this->dbConnection = new mysql('localhost', 'root', '', 'e_shop');
    }
}
