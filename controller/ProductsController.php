<?php
require_once 'model/Output.php';
require_once 'model/ProductsLogic.php';

class ProductsController
{
    public function __construct()
    {
        $this->Output = new Output();
        $this->ProductsLogic = new ProductsLogic();
    }

    public function __destruct()
    {
        // code
    }

    public function handleRequest($op)
    {
        try {
            switch ($op) {
                case 'read':
                    $this->collectReadProduct($_REQUEST['id']);
                    break;
                default:
                    $this->collectAllProducts();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectAllProducts() {
        $result = $this->ProductsLogic->readAllProducts();
        $html = $this->Output->createTable($result, "products", "product", "read", "update", "delete", "product_id");
        include 'view/show.php';
    }

    public function collectReadProduct($id)
    {
        $result = $this->ProductsLogic->readProduct($id);
        $html = $this->Output->createTable($result, "products", "product", "read", "update", "delete", "product_id");
        print $html;
    }

}