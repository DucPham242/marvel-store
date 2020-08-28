<?php 
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['stt'])){
	$id=(int)$_GET['id'];
	$stt=$_GET['stt'];
	$update=$admin->Update_STT_Order($id,$stt);
	if($update){
		echo "Cập nhật trạng thái thành công";
	}else{
		echo "Cập nhật thất bại";
	}
}


 ?>