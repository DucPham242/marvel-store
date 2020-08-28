<?php 
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && isset($_GET['src']) && $_GET['id']>0){
	$id=(int)$_GET['id'];
	$src=$_GET['src'];
	$del=$admin->del_Img_inList($id,$src);
	if($del){
		echo "<script>alert(' Xoá ảnh thành công !');</script>";
	}else{
		echo "<script>alert('Không xóa được ảnh !');</script>";
	}
	if(file_exists("../../../".$src)){
		unlink("../../../".$src);
	}
	
}

 ?>