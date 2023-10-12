<?php
require_once 'ContactsController.php';
require_once 'ProductsController.php';
class MainController
{
    public function __construct()
    {
        $this->ContactsController = new ContactsController();
        $this->ProductsController = new ProductsController();
    }

    public function handleRequest()
        {
            try {
                $act = isset($_GET['act']) ? $_GET['act'] : '';
                $op = isset($_GET['op']) ? $_GET['op'] : '';
                switch ($act) {
                case 'products':
                    $this->ProductsController->handleRequest($op);
                    break;
                case 'contacts':
                    $this->ContactsController->handleRequest($op);
                    break;
                default:
                    $this->ContactsController->handleRequest($op);
                    break;
                }
            } catch (Exception $e) {
                throw $e;
            }
        }
}