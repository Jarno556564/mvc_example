<?php
require_once 'model/DataHandler.php';

class ContactsLogic
{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "user_db", "root", "");
    }

    public function createContact($name, $phone, $email, $address)
    {
        $sql = "INSERT INTO contacts (name, phone, email, address) VALUES ('$name', '$phone', '$email', '$address')";
        $result = $this->DataHandler->createData($sql);
        return $result;
    }

    public function readContact($id)
    {
        try {
            $sql = "SELECT * FROM contacts WHERE id=" . $id;
            $result = $this->DataHandler->readData($sql);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function readAllContacts()
    {
        try {
            $sql = "SELECT * FROM contacts";
            $result = $this->DataHandler->readAlldata($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateContact($name, $phone, $email, $address, $id)
    {
        $sql = "UPDATE `contacts` SET `name` = '" . $name . "', `phone` = '" . $phone . "', `email` = '" . $email . "', `address` = '" . $address . "' WHERE id=" . $id;
        $result = $this->DataHandler->updateData($sql);
        return $result;
    }

    public function deleteContact($id)
    {
        $sql = "DELETE FROM contacts WHERE id=" . $id;
        $result = $this->DataHandler->deleteData($sql);
        return 'Deleted contact ID ' . $result;
    }

    public function readContactFromSearch($search)
    {
        try {
            $sql = "SELECT * FROM contacts
            WHERE id LIKE '%" . $search . "%'
            OR name LIKE '%" . $search . "%'
            OR phone LIKE '%" . $search . "%'
            OR email LIKE '%" . $search . "%'
            or address LIKE '%" . $search . "%'";

            $result = $this->DataHandler->readData($sql);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}