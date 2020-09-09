<?php 
session_start();
$ajax_flag=1;
include_once "../../controller/product_c.php";
$show = new Product_c();
if(isset($_GET['ss'])){
	$ss=$_GET['ss'];

	$_SESSION['sort']=$ss;








}




 ?>