<?php 
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=$_GET['id'];

	$rs=$admin->getProduct_ID($id);
	$rs_listimg=$admin->get_listImg($id);
	// echo "<pre>";
	// print_r($rs);
	// echo "</pre><hr>";
	// echo "<pre>";
	// print_r($rs_listimg);
	// echo "</pre>";
	foreach ($rs as $key => $value) {
		$Filelink_real="../../../".$value['img'];
		// echo $Filelink_real."<br>";
		unlink($Filelink_real);
	}
	foreach ($rs_listimg as $key => $value) {
		$Filelink_real="../../../".$value['path'];
		// echo $Filelink_real."<br>";
		unlink($Filelink_real);
		
	}
	rmdir("../../../images/product/".$id);
	
	$del=$admin->del_Product($id);
	if($del){
		echo "Xoá thành công";
	}else{
		echo "Xóa thất bại";
	}

}
?>