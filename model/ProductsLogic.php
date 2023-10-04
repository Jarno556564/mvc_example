<?php
require_once 'model/DataHandler.php';

class ProductsLogic
{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "user_db", "root", "");
    }

    public function readAllProducts()
    {
        try {
            $sql = "SELECT * FROM products";
            $result = $this->DataHandler->readAlldata($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function readProduct($id)
    {
        try {
            $sql = "SELECT * FROM products where product_id=" . $id;
            $result = $this->DataHandler->readData($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}