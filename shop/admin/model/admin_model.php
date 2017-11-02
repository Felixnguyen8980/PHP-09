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
		include 'view/products.php';
		$sqlview = "SELECT * FROM products";
	}
	public function addproducts(){
		if(isset($_POST['submit'])){
			$table = 'products';
			$name = $_POST['product_name'];
			$category = $_POST['category_id'];
			$description = $_POST['description'];
			$price = $_POST['price'];
			$target_dir = "../uploads/image/";
			$created=date("Y-m-d");
			$image = strtotime("now").$_FILES["image"]["name"];
			$target_file = $target_dir.$image;
			$sql = "INSERT INTO `products`(`category_id`, `name`, `description`, `price`, `image`, `created`) VALUES ('$category','$name','$description','$price','$image','$created')" ;
			mysqli_query($this->conn,$sql);
			if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
			unset($_POST['submit']);
		}
	}
	public function select_total($table){
		$sql = "SELECT * FROM $table";
		$result = mysqli_query($this->conn,$sql);
		return $result;
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