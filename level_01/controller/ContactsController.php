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

    public function handleRequest($op)
    {
        try {
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
        }
        include './view/contacts/createContact.php';
    }

    public function collectReadContact($id)
    {
        $result = $this->ContactsLogic->readContact($id);
        $html = $this->Output->createTable($result, "contacts", "id");
        include 'view/show.php';
    }

    public function collectReadAllContacts()
    {
        $result = $this->ContactsLogic->readAllContacts();
        $html = $this->Output->createTable($result, "contacts", "id");
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
        }
        $result = $this->ContactsLogic->readContact($id);
        include 'view/contacts/updateContact.php';
    }

    public function collectDeleteContact($id)
    {
        $html = $this->ContactsLogic->deleteContact($id);
        include 'view/show.php';
    }

}