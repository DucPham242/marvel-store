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
	$id=(int)$_GET['id'];

	$rs=$admin->getProduct_ID($id);
	$rs_listimg=$admin->get_listImg($id);
	// echo "<pre>";
	// print_r($rs);
	// echo "</pre><hr>";
	// echo "<pre>";
	// print_r($rs_listimg);
	// echo "</pre>";

	
	$del=$admin->del_Product($id);
	if($del){
			foreach ($rs as $key => $value) {
		$Filelink_real="../../../".$value['img'];
		// echo $Filelink_real."<br>";
		if(file_exists($Filelink_real)){
			unlink($Filelink_real);
		}
		
	}
	foreach ($rs_listimg as $key => $value) {
		$Filelink_real="../../../".$value['path'];
		// echo $Filelink_real."<br>";
		if(file_exists($Filelink_real)){
			unlink($Filelink_real);
		}
		
	}
	if(is_dir("../../../images/product/").$id){
		rmdir("../../../images/product/".$id);
	}

	$content_noti = 'Quản trị viên '.$_SESSION['name_admin']."(".$_SESSION['email_admin'].') đã xóa sản phẩm có id là '.$id.' vào lúc '.date('Y/m/d-H:i:s',time());
		$add_noti_user = $admin->add_noti_product($id, $content_noti,3);
		echo "Xoá thành công";
		
	}else{
		echo "Xóa thất bại!";
	}

}
?>