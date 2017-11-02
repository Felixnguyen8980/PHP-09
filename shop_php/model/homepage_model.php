<?php
require_once 'config/database.php';

class HomePageModel extends ConnectDB {

	public function getList($data){
        $dbres = mysqli_query($this->conn,"SELECT * FROM $data");
        $products = array();
        while ($obj = mysqli_fetch_object($dbres)) {
            $products[] = $obj;
        }
        return $products;
	}
	public function delete($table,$id){
		$sql = "DELETE FROM $table where id=$id";
		mysqli_query($this->conn,$sql);
	}
	public function select($value){
		var_dump($this->conn);
		$sql = "SELECT * FROM products 
		INNER JOIN product_categories 
		ON products.product_category_id=product_categories.id 
		WHERE product_categories.id=$value";
		$dbres =mysqli_query($this->conn,$sql);
		$products = array();
        while ($obj = mysqli_fetch_object($dbres)) {
            $products[] = $obj;
        }
        return $products;
	}
}