<?php
	ob_start();
	require_once 'controller/admin_controller.php';
	$view = new AdminController();
	$view->handle_request();
	ob_end_flush();
?>
