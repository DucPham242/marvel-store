<?php 
session_start();
if(!isset($_SESSION['stt_admin']) || $_SESSION['stt_admin']!=1){
 header("Location:../../login.php");
 exit();
}
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=(int)$_GET['id'];
	$del=$admin->Del_Admin($id);
	if($del){
		echo "Xoá thành công !";
	}else{
		echo "Thất bại! Có lỗi trong quá trình xóa";
	}

}



 ?>