<?php 
session_start();
$ajax_flag=1;
include_once "../../controller/info_c.php";
$show = new Info_c();
if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['content'])){
	$id_user=(int)$_GET['id'];
	$phone=trim($_GET['content']);

	$check_phone=count($show->getInfo_user_as_phone($phone));
	if ($phone=='') {
		echo "<span style='color:red;'>Số điện thoại không được để trống</span>";
	}else if(strlen($phone)!=10){
		echo "<span style='color:red;'>Số điện thoại không đúng định dạng</span>";
	}else if($check_phone!=0 && $phone!=$_SESSION['phone_user']){
		echo "<span style='color:red;'>Số điện thoại đã có tài khoản sử dụng</span>";
	}else{
		$rs=$show->edit_phone($phone,$id_user);
		if($rs){
			echo "<span style='color:green;'>Thành công</span>";
		}else{
			echo "<span style='color:red;'>Lỗi</span>";
		}
	}
}


?>