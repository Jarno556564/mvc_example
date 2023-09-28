<?php
require_once 'model/ContactsLogic.php';
require_once 'model/Output.php';

class ContactsController
{
    public function __construct()
    {
        $this->ContactsLogic = new ContactsLogic();
        $this->Output = new Output();

    }

    public function __destruct()
    {
        // code
    }

    public function handleRequest()
    {
        try {
            $op = isset($_GET['op']) ? $_GET['op'] : '';
            switch ($op) {
                case 'create':
                    $this->collectCreateContact();
                    break;
                case 'read':
                    $this->collectReadContact($_REQUEST['id']);
                    break;
                case 'createDropdown':
                    $this->collectCreateDropdown();
                    break;
                case 'readDropdown':
                    $this->collectReadDropdown($_REQUEST['name']);
                    break;
                case 'update':
                    $this->collectUpdateContact($_REQUEST['id']);
                    break;
                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
                    break;
                default:
                    $this->collectReadAllContacts();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateContact()
    {
        if (isset($_REQUEST['create'])) {
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
            $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
            $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;

            $contacts = $this->ContactsLogic->createContact($name, $phone, $email, $address);
        }
        include 'view/createContact.php';
    }

    public function collectReadContact($id)
    {
        $result = $this->ContactsLogic->readContact($id);
        $html = $this->Output->createList($result);
        include 'view/show.php';
    }

    public function collectReadAllContacts()
    {
        $result = $this->ContactsLogic->readAllContacts();
        $html = $this->Output->createTable($result);
        include 'view/show.php';
    }

    public function collectUpdateContact($id)
    {
        if (isset($_REQUEST['update'])) {
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
            $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
            $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;

            $res = $this->ContactsLogic->updateContact($name, $phone, $email, $address, $id);
            $msg = "Contact updated succesfully";
        }
        $res = $this->ContactsLogic->readContact($id);
        // [$name, $phone, $email, $address, $id] = $res;
        include 'view/updateContact.php';
    }

    public function collectDeleteContact($id)
    {
        $html = $this->ContactsLogic->deleteContact($id);
        include 'view/show.php';
    }

    public function collectCreateDropdown()
    {
        $result = $this->ContactsLogic->readAllContacts();
        $html = $this->Output->createDropdown($result);
        print $html;
    }

    public function collectReadDropdown($name)
    {
        $result = $this->ContactsLogic->readContactName($name);
        $html = $this->Output->createTable($result);
        print $html;
    }
}