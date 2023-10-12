<?php
require_once 'model/DataHandler.php';

class ProductsLogic
{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "user_db", "root", "");
    }

    public function createProduct($product_type_code, $supplier_id, $product_name, $product_price, $other_product_details)
    {
        $sql = "INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details)
                VALUES ('$product_type_code', '$supplier_id', '$product_name', '$product_price', '$other_product_details')";
        $result = $this->DataHandler->createData($sql);
        return $result;
    }

    public function readAllProducts($offset, $itemsPerPage)
    {
        try {
            $sql = "SELECT product_id, product_type_code, supplier_id, product_name, CONCAT('€ ',REPLACE(product_price, '.', ','))product_price, other_product_details FROM products LIMIT $offset, $itemsPerPage";
            $result = $this->DataHandler->readAlldata($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function countPages($itemsPerPage)
    {
        $sql = "SELECT COUNT(*) as count FROM products";
        $result = $this->DataHandler->readAlldata($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        $totalRecords = $res[0]['count'];
        $totalPages = ceil($totalRecords / $itemsPerPage);
        return $totalPages;
    }

    public function readProduct($id)
    {
        try {
            $sql = "SELECT product_id, product_type_code, supplier_id, product_name, CONCAT('€ ',REPLACE(product_price, '.', ','))product_price, other_product_details FROM products WHERE product_id=$id";
            $result = $this->DataHandler->readData($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateProduct($product_type_code, $supplier_id, $product_name, $product_price, $other_product_details, $product_id)
    {
        $sql = "UPDATE `products` SET `product_type_code` = '$product_type_code',
                                    `supplier_id` = '$supplier_id',
                                    `product_name` = '$product_name',
                                    `product_price` = '$product_price',
                                    `other_product_details` = '$other_product_details'
                WHERE product_id = $product_id";
        $result = $this->DataHandler->updateData($sql);
        return $result;
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE product_id=" . $id;
        $result = $this->DataHandler->deleteData($sql);
        return 'Amount of products deleted: ' . $result;
    }

    public function readSearchProduct($search)
    {
        try {
            $sql = "SELECT * FROM `products` WHERE (product_id LIKE '%$search%' OR product_type_code LIKE '%$search%' OR supplier_id LIKE '%$search%' OR product_name LIKE '%$search%' OR product_price LIKE '%$search%' OR other_product_details LIKE '%$search%')";
            $results = $this->DataHandler->readAllData($sql);
            $res = $results->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

}