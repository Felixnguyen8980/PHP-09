<?php
require_once 'config/database.php';


class UserModel extends ConnectDB {

	public function getListUser(){
		
        $dbres = mysqli_query($this->conn,"SELECT * FROM users");
        $users = array();
        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $users[] = $obj;
        }
        
        return $users;
	}
}