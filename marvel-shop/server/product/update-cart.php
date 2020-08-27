<?php 
	session_start();
	if(isset($_GET['id']) && isset($_GET['qty']) && isset($_SESSION['cart'])){

		$id=(int)$_GET['id'];
		$qty=(int)$_GET['qty'];
		if($qty<1){
			unset($_SESSION['cart'][$id]);
		}else{
			$_SESSION['cart'][$id]['qty']=$qty;
		}

	}





 ?>