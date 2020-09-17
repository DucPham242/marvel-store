<?php 
session_start();
$ajax_flag=1;
include_once "../../controller/admin_c.php";
if(!isset($_SESSION['stt_admin']) || $_SESSION['stt_admin']!=1){
 header("Location:../../login.php");
 exit();
}
$show = new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=(int)$_GET['id'];
	$del_user=$show->Del_User($id);
	if($del_user){
		$id_user = $id;
		$content_noti = 'Quản trị viên '.$_SESSION['name_admin']."(".$_SESSION['email_admin'].') đã xóa thành viên có id user là '.$id.' vào lúc '.date('Y/m/d-H:i:s',time());
		$add_noti_user = $show->add_noti_user($id_user, $content_noti,3);
		echo 'Xóa thành công';
	}else{
		echo "Thất bại ! Cõ lỗi trong quá trình xóa !";
	}
	
}


 ?>