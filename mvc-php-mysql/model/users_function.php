<?php
require_once 'model/connect_database.php';

class UsersFunction extends Connect {
    
    public function selectAll($order) {
        if ( !isset($order) ) {
            $order = "name";
        }
        $dbOrder =  mysqli_real_escape_string($this->conn,$order);
        $dbres = mysqli_query($this->conn,"SELECT * FROM users ORDER BY $dbOrder ASC");
        
        $users = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $users[] = $obj;
        }
        
        return $users;
    }
    
    public function selectById($id) {
        $dbId = mysqli_real_escape_string($this->conn,$id);
        
        $dbres = mysqli_query($this->conn,"SELECT * FROM users WHERE id=$dbId");
        
        return mysqli_fetch_object($dbres);
		
    }
    
    public function insert( $name, $phone, $email, $address ) {
        
        $dbName = ($name != NULL)?"'".mysqli_real_escape_string($this->conn,$name)."'":'NULL';
        $dbPhone = ($phone != NULL)?"'".mysqli_real_escape_string($this->conn,$phone)."'":'NULL';
        $dbEmail = ($email != NULL)?"'".mysqli_real_escape_string($this->conn,$email)."'":'NULL';
        $dbAddress = ($address != NULL)?"'".mysqli_real_escape_string($this->conn,$address)."'":'NULL';
        
        mysqli_query($this->conn,"INSERT INTO users (name, phone, email, address) VALUES ($dbName, $dbPhone, $dbEmail, $dbAddress)");
        return mysqli_insert_id($this->conn);
    }
    
    public function delete($id) {
        $dbId = mysqli_real_escape_string($this->conn,$id);
        mysqli_query($this->conn,"DELETE FROM users WHERE id=$dbId");
    }
    
}

?>
