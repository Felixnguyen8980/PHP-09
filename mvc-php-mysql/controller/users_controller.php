<?php

require_once 'model/users_model.php';

class UsersController {
    
    private $usersModel = NULL;
    
    public function __construct() {
        $this->usersModel = new UsersModel();
    }
    
    public function redirect($location) {
        header('Location: '.$location);
    }
    
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op || $op == 'list' ) {
                $this->listUsers();
            } elseif ( $op == 'new' ) {
                $this->saveUser();
            } elseif ( $op == 'delete' ) {
                $this->deleteUser();
            } elseif ( $op == 'show' ) {
                $this->showUser();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
    
    public function listUsers() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $users = $this->usersModel->getAllUsers($orderby);
        include 'view/list.php';
    }
    
    public function saveUser() {
       
        $title = 'Add new user';
        
        $name = '';
        $phone = '';
        $email = '';
        $address = '';
       
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            
            $name       = isset($_POST['name']) ?   $_POST['name']  :NULL;
            $phone      = isset($_POST['phone'])?   $_POST['phone'] :NULL;
            $email      = isset($_POST['email'])?   $_POST['email'] :NULL;
            $address    = isset($_POST['address'])? $_POST['address']:NULL;
            
            try {
                $this->usersModel->createNewUser($name, $phone, $email, $address);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        
        include 'view/add.php';
    }
    
    public function deleteUser() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        
        $this->usersModel->deleteUser($id);
        
        $this->redirect('index.php');
    }
    
    public function showUser() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        $user = $this->usersModel->getUser($id);
        
        include 'view/view.php';
    }
    
    public function showError($title, $message) {
        include 'view/error.php';
    }
    
}
?>
