<?php 
	session_start();
	$ajax_flag=1;
	

	if (isset($_POST['id']) && $_POST['id']>0) {
		$id = (int)$_POST['id'];
		if (isset($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]);
		}else {
			echo 'Sản phẩm này không có trong giỏ hàng';
		}

	}else{
		echo "id sản phẩm không hợp lệ";
	}
	
?>