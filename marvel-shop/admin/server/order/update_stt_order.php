<?php 
session_start();
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0 && isset($_GET['stt']) && isset($_GET['reason'])){
	$id=(int)$_GET['id'];
	$stt=$_GET['stt'];
	$reason=$_GET['reason'];
	if($stt==1){
		$name_stt="Đang xử lý";
	}else if($stt==2){
		$name_stt="Đã xác nhận";
	}else if($stt==3){
		$name_stt="Đang giao hàng";
	}else if($stt==4){
		$name_stt="Đã hoàn tất";
	}else if($stt==5){
		$name_stt="Đơn bị hủy";
	}
	
	$order=$admin->getOrder_ID($id);

	if($stt==5){
		
		$update=$admin->Update_STT_Order($id,$stt);
		$info_order=$admin->getDetail_Order_Name($id);
		// echo '<pre>';
  //           print_r($info_order);
  //           echo '</pre>';
           foreach ($info_order as $key => $detail) {
           		$edit_quantity=$admin->EditQuantity_Product($detail['id_product'],$detail['quantity']);
           }
		if($update){
			foreach ($order as $key => $value) {//Add thêm thông báo vào bảng noti_order
                     $content_noti="Quản trị viên ".$_SESSION['name_admin']."(".$_SESSION['email_admin']."): đã cập nhật lại trạng thái đơn hàng có ID là: ".$value['id_order']." thành '".$name_stt. "' vào lúc ".date('Y/m/d-H:i:s',time())."\n LÝ DO: ".$reason;
                      $add_noti=$admin->add_noti_order($id,$content_noti,2);
                    }

			echo "Cập nhật trạng thái thành công";
		}else{
			echo "Cập nhật thất bại";
		}
	}else{

		$update=$admin->Update_STT_Order($id,$stt);

		if($update){
			foreach ($order as $key => $value) {//Add thêm thông báo vào bảng noti_order
                     $content_noti="Quản trị viên ".$_SESSION['name_admin']."(".$_SESSION['email_admin']."): đã cập nhật lại trạng thái đơn hàng có ID là: ".$value['id_order']." thành '".$name_stt. "' vào lúc ".date('Y/m/d-H:i:s',time());
                      $add_noti=$admin->add_noti_order($id,$content_noti,2);
                    }
             if($stt==4){
             	$order_done=date("Y-m-d H:i:s",time());
             	$update_order_done=$admin->update_Orderdone($id,$order_done);
             }
			echo "Cập nhật trạng thái thành công";
		}else{
			echo "Cập nhật thất bại";
		}
	}
}


?>