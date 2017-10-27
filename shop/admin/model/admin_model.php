<?php                                 
class adminModel extends connectDB {
	public function login(){
		if(isset($_POST['submit'])){
			$username   = $_POST['username'];
			$password   = md5($_POST['password']);
			$role = "admin";
			$sqlLogin   = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role' ";
			$resultLogin = mysqli_query($this->conn,$sqlLogin);
			if ($resultLogin->num_rows > 0){
				$_SESSION['admin'] = $username;
			} else {
				echo "Username/Password  are not matching <br>";
			}
		}
	}
	public function logout(){
		unset($_SESSION['admin']);
	}
	public function viewlist(){
		$sqlview = "SELECT * FROM products";
	}
	public function addproducts(){
		if(isset($_POST['submit'])){
		}
	}
	public function addcategories(){
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$table = 'product_categories';
			$sql_insert = "INSERT INTO $table (name) VALUES ('$name')";
			mysqli_query($this->conn,$sql_insert);
		}
	}
	public function viewcategories($categoriespage,$limit){
			$table = 'product_categories';
			$from = $limit*($categoriespage - 1);
			$sql_view = "SELECT * FROM $table LIMIT $from,$limit";
			$result = mysqli_query($this->conn,$sql_view);
			$categories = array();
			while ( ($Obj =mysqli_fetch_object($result)) != NULL) {
				$categories[] = $Obj;
			} 
			return $categories;
		}
	public function countdata($database){
		$table =$database;
		$sql ="SELECT * FROM $table";
		$result = mysqli_query($this->conn,$sql);
		return $result->num_rows;
	}
}
?>