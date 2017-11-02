<?php
require_once 'config/database.php';

class HomePageModel extends ConnectDB {

	public function getListProduct($productCategoryID){
		if(is_null($productCategoryID)){
			$dbres = mysqli_query($this->conn,"SELECT * FROM products");
		}else{
        	$dbres = mysqli_query($this->conn,"SELECT * FROM products WHERE product_category_id = $productCategoryID");
    	}

        $products = array();

        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $products[] = $obj;
        }
        return $products;
	}
    //delete product
	public function deleteProduct($id){
		mysqli_query($this->conn,"DELETE FROM products WHERE id = $id");
		header("Location: index.php");
	}
    //get list user
	public function getListUser(){
        $dbres = mysqli_query($this->conn,"SELECT * FROM users");

        $users = array();

        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $users[] = $obj;
        }
        return $users;
	}
    //get list Category
	public function getListCategory(){
        $dbres = mysqli_query($this->conn,"SELECT * FROM product_categories");

        $product_categories = array();

        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $product_categories[] = $obj;
        }
        return $product_categories;
	}
    //add product 
    public function AddProduct($category_id, $name, $description, $price,  $discount, $imageName, $isHot, $created) {

        $dbres = mysqli_query($this->conn,"INSERT INTO products (product_category_id, name, description, price, discount, image, is_hot, created) 
                     VALUES ('$category_id', '$name', '$description', '$price',  '$discount', '$imageName', '$isHot', '$created')");
        //return $dbres;
    }

    public function GetProductCategory() {
        $dbres = mysqli_query($this->conn,"SELECT * FROM product_categories");

        $productCategories = array();

        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $productCategories[] = $obj;
        }
        return $productCategories;
    }
    //edit product
    public function EditProduct($id,$category_id, $name, $description, $price,  $discount, $imageName, $isHot, $modified) {

        $dbres = mysqli_query($this->conn,"UPDATE products SET product_category_id = '$category_id',name = '$name', description = '$description', price = '$price', discount= '$discoun', image = '$imageName', is_hot= '$isHot', modified = '$modified' WHERE id=$id");
    }
    // cart product
    public function CartProduct($listProductCartID) {
         $dbres = mysqli_query($this->conn,"SELECT products.id,products.name, products.description, products.price, products.image, products.is_hot,
                product_categories.name as category_name FROM products INNER JOIN product_categories ON products.product_category_id = product_categories.id 
                WHERE products.id IN $listProductCartID");
        $cartProduct = array();

        while ( ($obj = mysqli_fetch_object($dbres)) != NULL ) {
            $cartProduct[] = $obj;
        }
        return $cartProduct;

    }
    //delete product in cart
    public function Deletecart($idDelete) {
        unset($_SESSION['cart'][$idDelete]);
        header("Location: cart.php");
    }
    public function getProduct($id){
        $dbres = mysqli_query($this->conn,"SELECT * FROM products WHERE id = $id");

        $product = mysqli_fetch_object($dbres);
        return $product;
    }
}                                        