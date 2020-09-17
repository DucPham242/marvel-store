<?php 
session_start();
if(isset($_GET['ss'])){
	$ss=$_GET['ss'];

	$_SESSION['sort_product']=$ss;



}




 ?>