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
                case 'create':
                    $this->collectCreateProduct();
                    break;
                case 'read':
                    $this->collectReadProduct($_REQUEST['id']);
                    break;
                case 'update':
                    $this->collectUpdateProduct($_REQUEST['id']);
                    break;
                case 'delete':
                    $this->collectDeleteProduct($_REQUEST['id']);
                    break;
                case 'createDropdown':
                    $this->collectCreateDropdown();
                    break;
                case 'readDropdown':
                    $this->collectReadDropdown($_REQUEST['id']);
                    break;
                case 'createSearchBar':
                    $this->collectCreateSearchBar();
                    break;
                case 'readSearchBar':
                    $this->collectReadSearchBar($_REQUEST['search']);
                    break;
                default:
                    $this->collectReadAllProducts();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateProduct()
    {
        if (isset($_REQUEST['create'])) {
            $product_type_code = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : null;
            $supplier_id = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : null;
            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
            $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : null;

            $html = $this->ProductsLogic->createProduct($product_type_code, $supplier_id, $product_name, $product_price, $other_product_details);
            $message = $html > 0 ? "New Product added with id " . $html : "Failed to add new Product.";
            header("Location: index.php?act=products&message=$message");
        }
        $html = $this->Output->createNewProductForm();
        print $html;
    }

    public function collectReadAllProducts() {
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

    public function collectUpdateProduct($id)
    {
        if (isset($_REQUEST['update'])) {
            $product_type_code = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : null;
            $supplier_id = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : null;
            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : null;
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : null;
            $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : null;

            $html = $this->ProductsLogic->updateProduct($product_type_code, $supplier_id, $product_name, $product_price, $other_product_details, $id);
            $message = $html ? "Record updated successfully." : "Failed to update the record.";
            // header("Location: index.php?act=products&message=$message");
            exit;
        }

        $result = $this->ProductsLogic->readProduct($id);
        $html = $this->Output->createUpdateProductForm($result);
        print $html;
    }

    public function collectDeleteProduct($id)
    {
        $html = $this->ProductsLogic->deleteProduct($id);
        print $html;
    }

    public function collectCreateDropdown()
    {
        $result = $this->ProductsLogic->readAllProducts();
        $html = $this->Output->createDropdown($result);
        print $html;
    }

    public function collectReadDropdown($id)
    {
        $result = $this->ProductsLogic->readProduct($id);
        $html = $this->Output->createTable($result, "Products", "Product", "read", "update", "delete", "id");
        print $html;
    }

    public function collectCreateSearchBar() {
        $html = $this->Output->createSearchBar();
        print $html;
    }

    public function collectReadSearchBar($search)
    {
        $result = $this->ProductsLogic->readProductFromSearch($search);
        $html = $this->Output->createTable($result, "Products", "Product", "read", "update", "delete", "id");
        print $html;
    }

}