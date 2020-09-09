<?php 
$ajax_flag=1;
include_once "../../controller/info_c.php";
$show = new Info_c();
if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['content'])){
	$id_user=(int)$_GET['id'];
	$address=trim($_GET['content']);

	if($address==''){
		echo "<span style='color:red;'>Địa chỉ không được để trống</span>";
	}else{
		$rs=$show->edit_address($address,$id_user);
		if($rs){
			echo "<span style='color:green;'>Thành công</span>";
		}else{
			echo "<span style='color:red;'>Lỗi</span>";
		}
	}
}


?>