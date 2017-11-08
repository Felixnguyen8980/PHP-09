<?php
require_once 'user/config/database.php';
class UserModel extends ConnectDB {
	public function mainpage($view){
		$viewOption=$view;
		include 'user/view/view.php';
	}	
	public function products(){
		if(isset($_POST['btnSelect'])){
			if(isset($_SESSION['count'])){
				$_SESSION['count']+=1;
			} else {
				$_SESSION['count']=1;
			}
			$idBuy = $_POST['btnSelect'];
			if(isset($_SESSION['selected']) && isset($_SESSION['selected'][$idBuy]['quantity'])) {
				$_SESSION['selected'][$idBuy]['id'] = $idBuy;
				$_SESSION['selected'][$idBuy]['quantity'] +=1;
			}else{
				$_SESSION['selected'][$idBuy]['id'] = $idBuy;
				$_SESSION['selected'][$idBuy]['quantity'] = 1;
			}
		}
		$this->mainpage('user/view/products.php');
	}
	public function view($table) {
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		return $element;
	}
	public function viewl($table,$start,$end) {
		$sql = "SELECT * FROM $table LIMIT $start,$end";
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		return $element;
	}
	public function getid($table,$id) {
		$sql = "SELECT * FROM $table WHERE id=$id";
		$result = mysqli_query($this->conn,$sql);
		$element = array();
		while (($obj = mysqli_fetch_object($result))!=NULL){
			$element[] = $obj;
		}
		foreach ($element as $value)
		return $value;
	}
	public function listproducts($start,$end){
		$list = $this->viewl('products',$start,$end);
		return $list;
	}
	public function login(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($this->conn,$sql);
		if (isset($_SESSION['lastop'])){
		$lastop=$_SESSION['lastop'];
		}	else {
			$lastop=$_GET['lastop'];
		}
		var_dump($lastop);
		var_dump($result->num_rows);
		 if ($result->num_rows >0) {
		 	 $element = array();
		 	 while (($obj = mysqli_fetch_object($result))!=NULL){
			 $element[] = $obj;
			 }
			foreach ($element as $value)
		 	if(!isset($_SESSION['login'])){
				$_SESSION['login']=$value->id;
			}
		 	header("location:index.php?op=$lastop");
		 } else {
		  	echo "username/password are not matching";
		  	header("location:index.php?op=$lastop");
		 }
	}
	public function logout(){
		$lastop=$_GET['lastop'];
		session_destroy();
		header("location:index.php?op=$lastop");
	}
	public function buythemall(){
		$lastop=$_GET['lastop'];
		$status="waiting";
		$user_id=$_SESSION['login'];
		$create = date("Y-m-d");
		$total_price="0";
		$selected =$_SESSION['selected'];	
		$cartid=strtotime('now').'-'.$user_id;
		foreach($selected as $key => $selecteds) {
			$products_id=$key;
			$result=mysqli_query($this->conn,"SELECT * FROM products WHERE id='$products_id'");
			$element = array();
		 	 while (($obj = mysqli_fetch_object($result))!=NULL){
			 $element[] = $obj;
			 }
			 foreach($element as $products){
			$price=$products->price;
			$total_price+=$price*$selecteds['quantity'];
			$price_products = $price*$selecteds['quantity'];
			$quantity = $selecteds['quantity'];
			$sqlcart_detail ="INSERT INTO `cart_details`( cart_id,product_id,quantity,price) VALUES ('$cartid','$products->id','$quantity','$price_products')";	
			var_dump($sqlcart_detail);
			mysqli_query($this->conn,$sqlcart_detail);	
			}
		}
		$sqlcart="INSERT INTO carts(id,user_id, status,total_price,created) VALUES ('$cartid','$user_id','$status','$total_price','$create')";
		mysqli_query($this->conn,$sqlcart);
		header("location:index.php?op=$lastop");
		unset($_SESSION['selected']);
		unset($_SESSION['count']);
	}
}
?>