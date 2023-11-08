<?php

require_once "model/DataHandler.php";


class ContactsLogic {
    public function __construct()
    {
     $this->DataHandler = new Datahandler("localhost", "mysql", "stardunk_levels", "jay", "password");   
    }

    public function __destruct(){}
    public function createContact($name, $phone, $email, $address) {

        try {

            
        $sql = "INSERT INTO `contacts` (`name`, `phone`, `email`, `location`) VALUES (NULL, '{$name}', '{$phone}', '{$email}', '{$address}')";
        $results = $this->DataHandler->createData($sql);
        return $results;

    }catch (Exception $e){
        throw $e;  
    }
}

    public function readContacts($id) {
        try{

            $sql = "SELECT * FROM contacts WHERE `id`='{$id}'";            
            $results = $this->DataHandler->readData($sql);
            return $results;
            
        } catch (Exception $e){
            throw $e;
        }
     
    }
    public function readallContacts() {
        try{

            $sql = 'SELECT * FROM contacts';
            $results = $this->DataHandler->readsData($sql);
            return $results;
            
        } catch (Exception $e){
            throw $e;
        }
    }

    public function updateContact($id, $name, $phone, $email, $location) {

        try{

            $sql = "UPDATE `contacts` SET `name`='{$name}', `phone`='{$phone}', `email`='{$email}', `location`='{$location}' WHERE `id`='{$id}'";
            $results = $this->DataHandler->updateData($sql);
        return $results;


        } catch (Exception $e) {
        throw $e;
        }
    
    }

    public function deleteContact($id) {
        try{
            $sql ="DELETE FROM `contacts` WHERE `id` = '{$id}'";
            $results = $this->DataHandler->readsData($sql);
            return $results;
        } catch (Exception $e){
            throw $e;
        }
    }

}