<?php 
	session_start();
	$ajax_flag=1;
	

	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];
		if (isset($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]);
		}else {
			echo 'Lỗi';
		}

	}
	
?>