<?php 
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];
	$del=$admin->del_Product($id);
	if($del){
		echo "Xoá thành công";
	}else{
		echo "Xóa thất bại";
	}
}
 ?>