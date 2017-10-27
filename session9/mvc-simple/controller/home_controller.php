<?php
require_once 'config/database.php';
require_once 'model/user_model.php';
class HomeController {

	public function callFirstView(){
		//echo "Model hay xu ly cho toi";
		// goi ham lay thong tin tat ca user ra - bat thang model xu ly
		$user = new UserModel();
		$listUsers = $user->getListUser();

		include 'view/user/list_user.php';
	}
}