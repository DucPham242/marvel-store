<?php 
if(isset($ajax_flag)){
	include_once '../model/info_m.php';
}else{
	include_once 'model/info_m.php';
}


class Info_c extends Info_m
{
	private $info;

	public function __construct()
	{
		$this->info = new Info_m();
	}


	public function Manual(){
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method = 'contact'; //chuyển hướng về trang liên hệ
		}

		switch ($method) {
			case 'tutorial': //Trang hướng dẫn mua hàng
				include_once "views/information/how-buy.php";
				break;

			case 'contact': //Trang liên hệ
				# code...
				include_once "views/information/contact.php";
				break;
			
			default:
				header("Location:index.php");
			break;
		}
	}
}









?>