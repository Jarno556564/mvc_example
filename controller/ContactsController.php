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
                case 'update':
                    $this->collectUpdateContact($_REQUEST['id']);
                    break;
                case 'delete':
                    $this->collectDeleteContact($_REQUEST['id']);
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

            $html = $this->ContactsLogic->createContact($name, $phone, $email, $address);
            $message = $html > 0 ? "New contact added with id " . $html : "Failed to add new contact.";
            header("Location: index.php?message=$message");
        }
        $html = $this->Output->createNewContactForm();
        print $html;
    }

    public function collectReadContact($id)
    {
        $result = $this->ContactsLogic->readContact($id);
        $html = $this->Output->createList($result);
        print $html;
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

            $html = $this->ContactsLogic->updateContact($name, $phone, $email, $address, $id);
            $message = $html ? "Record updated successfully." : "Failed to update the record.";
            header("Location: index.php?message=$message");
            exit;
        }

        $result = $this->ContactsLogic->readContact($id);
        $html = $this->Output->createUpdateForm($result);
        print $html;
    }

    public function collectDeleteContact($id)
    {
        $html = $this->ContactsLogic->deleteContact($id);
        print $html;
    }

    public function collectCreateDropdown()
    {
        $result = $this->ContactsLogic->readAllContacts();
        $html = $this->Output->createDropdown($result);
        print $html;
    }

    public function collectReadDropdown($id)
    {
        $result = $this->ContactsLogic->readContact($id);
        $html = $this->Output->createTable($result);
        print $html;
    }

    public function collectCreateSearchBar() {
        $html = $this->Output->createSearchBar();
        print $html;
    }

    public function collectReadSearchBar($search)
    {
        $result = $this->ContactsLogic->readContactFromSearch($search);
        $html = $this->Output->createTable($result);
        print $html;
    }
}