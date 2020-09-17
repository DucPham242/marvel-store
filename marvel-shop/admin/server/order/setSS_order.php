<?php 
session_start();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=(int)$_GET['id'];
	$_SESSION['key_order']='%'.$id.'%';
}




 ?>