<?php 
session_start();
$ajax_flag=1;
include_once "../../controller/product_c.php";
$add=new Product_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=(int)$_GET['id'];
	$product=$add->getProduct_Id_SS($id);
	$product=$add->add_discount_SS($product);
	
			// echo "<pre>";
			// print_r($product);
			// echo "</pre>";

			
	if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
		$_SESSION['cart'][$id]=$product;
		$_SESSION['cart'][$id]['qty'] = 1;

	}else{
		if (array_key_exists($id, $_SESSION['cart'])) {
			$_SESSION['cart'][$id]['qty'] +=1;
		}else{
			$_SESSION['cart'][$id] = $product;
			$_SESSION['cart'][$id]['qty'] = 1;
		}

	}
	echo "<pre>";
			print_r($_SESSION['cart']);
			echo "</pre>";
			
}







?>