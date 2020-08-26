<?php 
	$ajax_flag=1;
	include_once "../controller/info_c.php";
	$show = new Info_c();
	if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['content'])){
		$id_user=(int)$_GET['id'];
		$address=$_GET['content'];

		$rs=$show->edit_address($address,$id_user);
		if($rs){
			echo "OK";
		}else{
			echo "Lỗi";
		}
	}


 ?>