<?php
include 'user/model/user_model.php';
class userController {
	public function handle_request(){
		$op = (isset($_GET['op']))? $_GET['op']:'home';
		switch ($op) {
			case 'home':
				 	$this->mainpage();
				break;
			case 'products':
				 	$this->products();
				break;
			case 'login':
			 	$this->login();
			break;
			default:
				# code...
				break;
		}
	}
	public function mainpage(){
		$model = new UserModel();
		$view ='user/view/home.php';
		$model-> mainpage($view);
	}
	public function products(){
		$model = new UserModel();
		$model-> products();
	}
	public function login(){
		 $model = new UserModel();
		 $model-> login();

	}
}
?>