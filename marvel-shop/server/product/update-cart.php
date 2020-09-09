<?php 
session_start();
$ajax_flag=1;
include_once "../../controller/product_c.php";
$show = new Product_c();
if(isset($_GET['id']) && isset($_GET['qty']) && isset($_SESSION['cart'])){

	$id=(int)$_GET['id'];
	$qty=(int)$_GET['qty'];
	$rs_product=$show->getProduct_Id($id);
		// echo "<pre>";
		// print_r($rs_product);
		// echo "</pre>";
	foreach ($rs_product as $key => $value) {
		if($qty<1){
			unset($_SESSION['cart'][$id]);
		}else if($qty>$value['quantity']){
			//Nếu khách tăng số lượng qty lớn hơn quantity,thì không làm gì cả 
		}else{
			$_SESSION['cart'][$id]['qty']=$qty;
		}
	}

}





?>