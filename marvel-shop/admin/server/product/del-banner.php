<?php 
session_start();
$ajax_flag = 1;
include_once '../../controller/admin_c.php';
if (!isset($_SESSION['stt_admin']) || $_SESSION['stt_admin']!=1) {
	header("Location:../../index.php");
	exit();
}
$admin = new Admin_c();
if (isset($_GET['id']) && $_GET['id'] > 0) {
	$id = $_GET['id'];

	$get_banner = $admin->get_banner_id($id);

		// echo '<pre>';
		// print_r($get_banner);
	$del = $admin->del_banner($id);
	if ($del) {
		foreach ($get_banner as $key => $value) {
			$Filelink_real="../../../".$value['path'];
		// echo $Filelink_real."<br>";
			if(file_exists($Filelink_real)){
				unlink($Filelink_real);
			}
		}
		
		echo 'xóa thành công';
	}else {
		echo 'xóa thất bại';
	}
}


?>