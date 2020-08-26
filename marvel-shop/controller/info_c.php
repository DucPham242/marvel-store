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

//Hàm cho Ajax
//Lấy hàm getDetailOrder_Id($id_order) cho Ajax
	public function getDetailOrder_Id($id_order){
		return $this->info->getDetailOrder_Id($id_order);
	}
//Lấy hàm edit_address($address,$id_user) cho Ajax
	public function edit_address($address,$id_user){
		return $this->info->edit_address($address,$id_user);
	}


	public function Manual(){
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method = 'contact'; //chuyển hướng về trang liên hệ
		}

		switch ($method) {
			case 'info-user':
				if(!isset($_COOKIE['id_user'])&& empty($_COOKIE['id_user'])){
					header("Location:index.php?page=info&method=login");
				}
				$info_user=$this->info->getInfo_user($_COOKIE['id_user']);
				// echo "<pre>";
				// print_r($info_user);
				// echo "</pre>";

				$info_order=$this->info->getOrder_Id($_COOKIE['id_user']);
				// echo "<pre>";
				// print_r($info_order);
				// echo "</pre>";

				include_once "views/information/infor-user.php";
				break;

			case 'login':
					if(isset($_COOKIE['id_user']) && isset($_COOKIE['name_user'])){
					header("Location:index.php?page=info&method=info-user");
					}
					if(isset($_POST['submit_login'])){
						$email=$_POST['email'];
						$pass=base64_encode($_POST['pass']);

						$rs=$this->info->getInfo_user_login($email,$pass);
						// echo "<pre>";
						// print_r($rs);
						// echo "</pre>";
						if(count($rs)!=1){
							$_SESSION['noti_login']=1;
						}
						else{
							foreach ($rs as $key => $value) {
								setcookie('id_user', $value['id_user'], time() + (90* 86400*100));
								setcookie('name_user', $value['name_user'], time() + (90* 86400*100));
							}
							echo "ok";
							header("Location:index.php?page=info&method=info-user");
						}
					}


					include_once "views/information/user-login.php";
					break;
			case 'logout':
				setcookie('id_user','',(time()-999999999999999999999999999));
				setcookie('name_user','',(time()-999999999999999999999999999));
				header("Location:index.php?page=info&method=login");

				break;
			case 'register':
			if(isset($_POST['submit_register'])){
				$name=$_POST['name'];
				$email=$_POST['email'];
				$pass=base64_encode($_POST['pass']);
				$phone=$_POST['phone'];
				$address=$_POST['address'];

				$rs_email=$this->info->getInfo_user_as_email($email);
				$rs_phone=$this->info->getInfo_user_as_phone($phone);

						// echo "<pre>";
						// print_r($rs_email);
						// echo "</pre>";
						// echo "<pre>";
						// print_r($rs_phone);
						// echo "</pre>";
				if(count($rs_email)!=0){
					$_SESSION['noti_regis']=1;
				}else if(count($rs_phone)!=0){
					$_SESSION['noti_regis']=2;
				}else{
					$add_user=$this->info->add_User($name,$phone,$email,$address,$pass);
					if($add_user){
						$_SESSION['noti_regis']=3;
						header("Location:index.php?page=info&method=login");
					}else{
						$_SESSION['noti_regis']=4;
					}
				}

				
			

			}






			include_once "views/information/user-register.php";
			break;	
			case 'checkout':
			include_once "views/information/checkout.php";
			break;
			
			case 'forget':
			include_once "views/information/forget-pass.php";
			break;


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