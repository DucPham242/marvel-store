<?php

if(isset($ajax_flag)){
	include_once '../../model/info_m.php';
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
//Lấy hàm check_voucher($code) cho AJax
	public function check_voucher($code){
		return $this->info->check_voucher($code);
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
			if(isset($_POST['submit_login'])){ //Đăng nhập bình thường
				$email=$_POST['email'];
				$pass=md5(base64_encode($_POST['pass']));

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

//------------------Đăng nhập FB

			//Cấu hình config
			include_once 'Facebook/autoload.php';

			if (!session_id())
			{
				session_start();
			}

			// Call Facebook API

			$facebook = new \Facebook\Facebook([
				'app_id'      => '1006323689780142',
				'app_secret'     => 'e170d11076659c29488f382747d5f873',
				'default_graph_version'  => 'v8.0'
			]);
			//END cấu hình

			$facebook_output = '';

			$facebook_helper = $facebook->getRedirectLoginHelper();

			if(isset($_GET['code']))
			{
				if(isset($_SESSION['access_token']))
				{
					$access_token = $_SESSION['access_token'];
				}
				else
				{
					$access_token = $facebook_helper->getAccessToken();

					$_SESSION['access_token'] = $access_token;

					$facebook->setDefaultAccessToken($_SESSION['access_token']);
				}

				$graph_response = $facebook->get("/me?fields=name,email", $access_token);

				$facebook_user_info = $graph_response->getGraphUser();

				if(!empty($facebook_user_info['id'])){
					$_SESSION['user_idFB'] = $facebook_user_info['id'];
					$_SESSION['user_imageFB'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
					setcookie('user_imageFB',$_SESSION['user_imageFB'] , time() + (90* 86400*100));

				}
				if(!empty($facebook_user_info['name']))
				{
					$_SESSION['user_nameFB'] = $facebook_user_info['name'];

				}

			}else{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/PHP0320E2/marvel-store/marvel-shop/index.php?page=info&method=login', $facebook_permissions);
    
    // Render Facebook login button
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="images/login_FB.png" style="width:240px;" /></a></div>';
}

if(isset($_SESSION['user_idFB']) && isset($_SESSION['user_nameFB'])){
		//Kiểm tra xem có tồn tại tài khoản chứa ID FB này không.
	$user_FB=$this->info->get_User_FB($_SESSION['user_idFB']);
	if(count($user_FB)==0){
		$pass=md5(base64_encode($_SESSION['user_idFB']));
		$add_user_FB=$this->info->add_User_FB($_SESSION['user_idFB'],$_SESSION['user_nameFB'],$pass);
		$id_last=$this->info->lastInsertId();
		setcookie('id_user',$id_last, time() + (90* 86400*100));
		setcookie('name_user',$_SESSION['user_nameFB'], time() + (90* 86400*100));
		header("Location:index.php?page=info&method=info-user");

	}else{
		// echo "<pre>";
		// 				print_r($user_FB);
		// 				echo "</pre>";
		foreach ($user_FB as $key => $value) {
			setcookie('id_user',$value['id_user'], time() + (90* 86400*100));
			setcookie('name_user',$value['name_user'], time() + (90* 86400*100));
			header("Location:index.php?page=info&method=info-user");
		}
	}

}
// --------------END LOGIN FB

include_once "views/information/user-login.php";
break;
case 'logout':
setcookie('id_user','',(time()-999999999999999999999999999));
setcookie('name_user','',(time()-999999999999999999999999999));
setcookie('user_imageFB','',(time()-999999999999999999999999999));

session_destroy();

// header("Location:index.php?page=info&method=login");
header("Location:index.php");

break;
				//logout checkout
case 'logout1':
setcookie('id_user','',(time()-999999999999999999999999999));
setcookie('name_user','',(time()-999999999999999999999999999));
header("Location:index.php?page=home&method=cart");

break;
case 'register':
if(isset($_POST['submit_register'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=md5(base64_encode($_POST['pass']));
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
			//Nếu k tồn tại ss cart đá về trang chủ
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
	header("Location:index.php");
}
include_once 'PHPMailer/class.phpmailer.php';
include_once 'PHPMailer/class.smtp.php'; 
if (isset($_COOKIE['id_user']) && isset($_COOKIE['name_user'])) {

			$rs_checkout = $this->info->getInfo_user($_COOKIE['id_user']);// lấy thông tin đăng nhập của người dùng
		}
			// thêm mới tài khoản nếu khách hàng chưa có tài khoản
		if (isset($_POST['submit']) && !isset($_COOKIE['id_user']) && !isset($_COOKIE['name_user'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$note = $_POST['mess'];
			$id_payment = $_POST['payment'];
			$total = $_SESSION['TOTAL_ORDER'];
				// $pass = base64_encode('123456');

				// $rs_email=$this->info->getInfo_user_as_email($email);
				// $rs_phone=$this->info->getInfo_user_as_phone($phone);

				// if (count($rs_email) != 0 && count($rs_phone) != 0) {
				// 	$get_user = $this->info->get_user($_POST['email'], $_POST['phone']);
					// foreach ($get_user as $key => $value) {

					// }
					// $id_user = $value['id_user'];
			$add = $this->info->get_info($name,$id_payment, $total, $phone, $email, $address, $note);
					// if ($add) {
					// 	echo 'Thêm mới thành công';

					// }else {
					// 	echo 'Thêm mới thất bại';
					// }
				// }else {

				// 	$create= $this->info->create_account($name_user, $phone, $email, $pass, $address);
				// 	$last = $this->info->lastInsertId();
				// 	$id_user = $last;
				// 	$add = $this->info->get_info($id_user, $id_payment, $total, $phone, $email, $address, $note);
				// if ($create) {
				// 	echo '<h4 style="color:red;">'. 'Thêm mới thành công'.'</h4>';

				// }else {
				// 	echo 'thêm mới không thành công';
				// }
			$last_order = $this->info->lastInsertId();

				// lấy thông tin phương thức thanh toán để gửi mail
			$id = $last_order;
			$order = $this->info->get_order($id);
			foreach ($order as $key => $value) {
				if ($value['id_payment'] == 1) {
					$buy = 'SHIP COD';
					$price_buy = number_format(35000).' đ';
				}else{
					$buy = 'Chuyển khoản qua ngân hàng';
					$price_buy = 0;
				}
			}

//Thêm dữ liệu vào bảng tbl_detail_order
			$id_order = $last_order;
			foreach ($_SESSION['cart'] as $key => $cart) {
				if ($cart['discount'] <= 0) {
					$total_detail_order=$cart['qty']*$cart['price'];
					$add_detail = $this->info->add_detai_order($id_order, $cart['id_product'], $cart['qty'], $cart['price'], $total_detail_order);
				}else if ($cart['discount'] > 0) {
					$total_detail_order=$cart['qty']*$cart['discount_price'];
					$add_detail = $this->info->add_detai_order($id_order, $cart['id_product'], $cart['qty'], $cart['discount_price'], $total_detail_order);
				}

					//trừ số lượng sản phẩm khi khách click đặt hàng
				$del_qty_pro = $this->info->del_qty_pro($cart['qty'], $cart['id_product']);

			}


		//gửi mail 
			$data = '<!DOCTYPE html>
			<html lang="">
			<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Title Page</title>

			<!-- Bootstrap CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			</head>
			<body>


			<div class="container">
			<div class="row">
			<div class="col-md-12 col-xs-12">
			<h2>Kính gửi anh chị: '.$name.'.</h2>
			<p>Marvel Store trân trọng cảm ơn Anh/Chị đã đặt hàng qua hệ thống</p>
			<p>Trước khi tiến hành gửi hàng đến địa chỉ Anh/Chị mong muốn, hệ thống xin được xác nhận lại các thông tin về đơn hàng</p>
			<h3>1. Chi tiết đơn hàng</h3>';

			$data.='<table class="table table-hover" border="1px">
			<thead>
			<tr>
			<th>Tên sản phẩm</th>
			<th>Hình ảnh sản phẩm</th>
			<th>Số lượng sản phẩm</th>
			<th>Giá niêm yết</th>
			<th>Giá sau khi giảm</th>
			</tr>

			</thead>
			<tbody>';
			foreach($_SESSION['cart'] as $key => $value){
				$data.='<tr>
				<td>'.$value['name_product'].'</td>
				<td style="text-align: center"><img src="'.$value['img'].'" alt="" width="200px"></td>
				<td>'.$value['qty'].'</td>
				<td>'.number_format($value['price']).'</td>
				';if ($value['discount'] <= 0) {
					$data.='<td>'.number_format($value['price']).'</td>';
				}else{
					$data.='<td>'.number_format($value['discount_price']).'</td>';
				}
				$data.='</tr>
				';
			}
			$data.='<tr>
			<td><b>Hình thức thanh toán:</b></td>
			<td colspan="4">Thanh toán bằng: '.$buy.'</td>
			</tr>
			<tr>
			<td><b>Phí giao hàng</b></td>
			<td colspan="4">'.$price_buy.'</td>
			</tr>
			<tr>
			<td colspan="5">Tổng cộng:'.number_format($_SESSION['TOTAL_ORDER']).'</td>
			</tr>

			</tbody>
			</table>
			<h3>2. Thông tin khách hàng</h3>
			<p>Tên khách hàng: '.$name.'.</p>
			<p>Địa chỉ nhận hàng: '.$address.'.</p>
			<p>Trên đây là các thông tin về đơn hàng Anh/Chị vui lòng xác nhận lại để đơn hàng được giao theo đúng tiến độ.</p>
			<p>Một lần nữa, trân trọn cảm ơn Anh/Chị đã tin tưởng và đồng hành cùng Marvel Store. hy vọng hệ thống sẽ được tiếp đón ANh/Chị trong thời gian tới!</p>
			<br>
			<h4><i>Trân trọng.</i></h4>
			<h4><i><img src="icon-marvel.png" alt="" width="30px">Marvel Store</i></h4>
			</div>
			</div>								
			</div>


			<!-- jQuery -->
			<script src="//code.jquery.com/jquery.js"></script>
			<!-- Bootstrap JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<script src="Hello World"></script>
			</body>
			</html>';
			$mail = new PHPMailer(true);

			try {
		    //Server settings
				$mail->CharSet = 'UTF-8';
		    $mail->SMTPDebug = 0;                // Enable verbose debug output
		    $mail->isSMTP();                                      // Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';              // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
		    $mail->Username   = 'ngocduc24021997@gmail.com';               // SMTP username
		    $mail->Password   = 'ngocduc2402';                         // SMTP password
		    $mail->SMTPSecure = 'tls';   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                              // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom('marvel-shop@gmail.com', 'Marvel Store-Thế giới đồ chơi số 1 tại Việt Nam');// tên của tài khoản để hiển thị email.
		    $mail->addAddress($email); // email và tên người nhận

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'THÔNG BÁO ĐƠN HÀNG';
		    $mail->Body    =$data;

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		unset($_SESSION['cart']);
		unset($_SESSION['total']);
		echo "<script>alert('Đặt hàng thành công!');";
		echo "window.location.href = 'index.php';</script>";

	}else if(isset($_POST['submit']) && isset($_COOKIE['id_user']) && isset($_COOKIE['name_user'])){


		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$note = $_POST['mess'];
		$id_payment = $_POST['payment'];
		$total = $_SESSION['TOTAL_ORDER'];

		// $id_user = $value['id_user'];	
		$add = $this->info->get_info_Login($_COOKIE['id_user'],$name, $id_payment, $total, $phone, $email, $address, $note);



		$last_order = $this->info->lastInsertId();

		$id = $last_order;
		$order = $this->info->get_order($id);
		foreach ($order as $key => $value) {
			if ($value['id_payment'] == 1) {
				$buy = 'SHIP COD';
				$price_buy = number_format(35000).' đ';
			}else{
				$buy = 'Chuyển khoản qua ngân hàng';
				$price_buy = 0;
			}
		}

//Thêm dữ liệu vào bảng tbl_detail_order
		$id_order = $last_order;
		foreach ($_SESSION['cart'] as $key =>  $cart) {
			if ($cart['discount'] <= 0){
				$total_detail_order=$cart['qty']*$cart['price'];
				$add_detail = $this->info->add_detai_order($id_order, $cart['id_product'], $cart['qty'], $cart['price'], $total_detail_order);
			}else if($cart['discount']>0){
				$total_detail_order=$cart['qty']*$cart['discount_price'];
				$add_detail = $this->info->add_detai_order($id_order, $cart['id_product'], $cart['qty'], $cart['discount_price'], $total_detail_order);
			}
					//trừ số lượng sản phẩm khi khách click đặt hàng
			$del_qty_pro = $this->info->del_qty_pro($cart['qty'], $cart['id_product']);
		}

		//gửi mail 
		$data = '<!DOCTYPE html>
		<html lang="">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		</head>
		<body>
		

		<div class="container">
		<div class="row">
		<div class="col-md-12 col-xs-12">
		<h2>Kính gửi anh chị: '.$name.'.</h2>
		<p>Marvel Store trân trọng cảm ơn Anh/Chị đã đặt hàng qua hệ thống</p>
		<p>Trước khi tiến hành gửi hàng đến địa chỉ Anh/Chị mong muốn, hệ thống xin được xác nhận lại các thông tin về đơn hàng</p>
		<h3>1. Chi tiết đơn hàng</h3>';

		$data.='<table class="table table-hover" border="1px">
		<thead>
		<tr>
		<th>Tên sản phẩm</th>
		<th>Hình ảnh sản phẩm</th>
		<th>Số lượng sản phẩm</th>
		<th>Giá niêm yết</th>
		<th>Giá sau khi giảm</th>
		</tr>

		</thead>
		<tbody>';
		foreach($_SESSION['cart'] as $key => $value){
			$data.='<tr>
			<td>'.$value['name_product'].'</td>
			<td style="text-align: center"><img src="'.$value['img'].'" alt="" width="200px"></td>
			<td>'.$value['qty'].'</td>
			<td>'.number_format($value['price']).'</td>
			';if ($value['discount'] > 0) {
				$data.='<td>'.number_format($value['discount_price']).'</td>';
			}else{
				$data.='<td>'.number_format($value['price']).'</td>';
			}
			$data.='</tr>
			';
		}
		$data.='<tr>
		<td><b>Hình thức thanh toán:</b></td>
		<td colspan="4">Thanh toán bằng: '.$buy.'</td>
		</tr>
		<tr>
		<td><b>Phí giao hàng</b></td>
		<td colspan="4">'.$price_buy.'</td>
		</tr>
		<tr>
		<td colspan="5">Tổng cộng:'.number_format($_SESSION['TOTAL_ORDER']).'</td>
		</tr>

		</tbody>
		</table>
		<h3>2. Thông tin khách hàng</h3>
		<p>tên khách hàng: '.$name.'.</p>
		<p>Địa chỉ nhận hàng: '.$address.'.</p>
		<p>Trên đây là các thông tin về đơn hàng Anh/Chị vui lòng xác nhận lại để đơn hàng được giao theo đúng tiến độ.</p>
		<p>Một lần nữa, trân trọn cảm ơn Anh/Chị đã tin tưởng và đồng hành cùng Marvel Store. hy vọng hệ thống sẽ được tiếp đón ANh/Chị trong thời gian tới!</p>
		<br>
		<h4><i>Trân trọng.</i></h4>
		<h4><i><img src="icon-marvel.png" alt="" width="30px">Marvel Store</i></h4>
		</div>
		</div>								
		</div>


		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="Hello World"></script>
		</body>
		</html>';
		$mail = new PHPMailer(true);

		try {
		    //Server settings
			$mail->CharSet = 'UTF-8';
		    $mail->SMTPDebug = 0;                // Enable verbose debug output
		    $mail->isSMTP();                                      // Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';              // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
		    $mail->Username   = 'ngocduc24021997@gmail.com';               // SMTP username
		    $mail->Password   = 'ngocduc2402';                         // SMTP password
		    $mail->SMTPSecure = 'tls';   // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                              // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom('marvel-shop@gmail.com', 'Marvel Store-Thế giới đồ chơi số 1 tại Việt Nam');// tên của tài khoản để hiển thị email.
		    $mail->addAddress($email); // email và tên người nhận

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'THÔNG BÁO ĐƠN HÀNG';
		    $mail->Body    =$data;

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		unset($_SESSION['cart']);
		unset($_SESSION['total']);
		echo "<script>alert('Đặt hàng thành công!')</script>;";
		echo "<script>window.location.href = 'index.php';</script>";
	}

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