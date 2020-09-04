<?php 
session_start();
$ajax_flag=1;
include_once "../../controller/info_c.php";
$show = new Info_c();
if(isset($_GET['code'])){
	$code=$_GET['code'];
$check=$show->check_voucher($code);
// echo "<pre>";
// print_r($check);
// echo "</pre>";
if(count($check)!=1){
	echo "<span style='color:red;'>Mã giảm giá không đúng</span>";
	$_SESSION['discount_voucher']=0;
}else{
	foreach ($check as $key => $value) {
		$time=time();
		// echo "Thời gian hiện tại là :".$time."<br>";
		$created=strtotime($value['created']);
		// echo "Thời gian code đc tạo là:".$created."<br>";
		$time_apply=$value['time_apply']*86400;
		// echo "Code có giá trị trong:". $time_apply."<br>";
		$my_time=$time-$created;
		// echo "Thời gian từ khi code đc tạo đến hiện tại là:".$my_time."<br>";
		if($_SESSION['total']<$value['apply_for']){
			echo "<span style='color:red;'>Trị giá đơn hàng của bạn chưa đủ để sử dụng Voucher này</span>";
			$_SESSION['discount_voucher']=0;
		}else if($my_time>$time_apply){
			echo "<span style='color:red;'>Mã Voucher đã hết hạn</span>";
			$_SESSION['discount_voucher']=0;
		}else if($my_time<$time_apply){
			echo "<span style='color:green;'>Thành công</span>";
			$_SESSION['discount_voucher']=$value['discount'];
		}
	}
}

}

 ?>