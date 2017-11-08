<?php
	ob_start();
	require_once 'user/controller/user_controller.php';
	session_start();
	$user =new userController();
	$user->handle_request();
	ob_end_flush();
?>