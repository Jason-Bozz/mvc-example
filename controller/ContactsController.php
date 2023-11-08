<?php

require_once 'model/ContactsLogic.php';
require_once 'model/Display.php';

class ContactsController {
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'create':
                   
                     $this->collectCreateContact();
                
                    break;

                    case 'delete':
                   
                        $this->collectDeleteContact($_REQUEST['id']);
                   
                       break;

                       case 'update':
                   
                        $this->collectUpdateContact($_REQUEST['id']);
                   
                       break;

                       case 'read':
                   
                        $this->collectReadContact($_REQUEST['id']);
                   
                       break;
                
                default:
                    # code...
                    $this->collectReadallContacts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

        public function collectReadContact() {
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            $res = $this->ContactsLogic->readContacts($id);
            $html = $this->Display->createCard($res);
            
            include 'view/read.php';
        }


        public function collectCreateContact(){

            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;
            $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : NULL;
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : NULL;
            $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : NULL;

            if(isset($_POST['submit'])) {
                $html = $this->ContactsLogic->createContact($name, $phone, $email, $location);


              $msg = $html;

            }

            include 'view/create.php';
        }
        
        public function collectReadallContacts(){

            $res = $this->ContactsLogic->readallContacts();
            $html = $this->Display->createTable($res);
            include 'view/contacts.php';
        }

    public function collectUpdateContact(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : $msg = "ho ho ho";

        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : NULL;
        $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : NULL;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : NULL;
        $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : NULL;

        if(isset($_POST['submit'])) {
        $html = $this->ContactsLogic->updateContact($id, $name, $phone, $email, $location);

          $msg = $html;

          $html = $this->ContactsLogic->readContacts($id);
          $html = $this->Display->createCard($html);
          include 'view/read.php';

        }
        $html = $this->ContactsLogic->readContacts($id);
        $html = $html->fetch(PDO::FETCH_ASSOC);
        include 'view/update.php';
       
    }

    public function collectDeleteContact() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : $msg = "Ho ho ho";

        $contacts = $this->ContactsLogic->deleteContact($id);
        include 'view/delete.php';
    }
    }

  