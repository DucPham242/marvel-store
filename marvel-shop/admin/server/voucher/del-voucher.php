<?php 
session_start();
$ajax_flag=1;
include_once"../../controller/admin_c.php";
if(!isset($_SESSION['stt_admin']) || $_SESSION['stt_admin']!=1){
 header("Location:../../login.php");
 exit();
}
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];

	$del=$admin->Del_Voucher($id);
	if($del){
		echo "Xóa thành công !";
	}else{
		echo "Thất bại ! Có lỗi trong quá trình xóa !";
	}
}




 ?>