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
//Lấy hàm edit_phone($phone,$id_user) cho ajax
	public function edit_phone($phone,$id_user){
		return $this->info->edit_phone($phone,$id_user);
	}
//Lấy hàm check_voucher($code) cho AJax
	public function check_voucher($code){
		return $this->info->check_voucher($code);
	}
//Lấy hàm getInfo_user_as_phone($phone) cho ajax
	public function getInfo_user_as_phone($phone){
		return $this->info->getInfo_user_as_phone($phone);
	}


	public function Manual(){
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method = 'home';
		}

		switch ($method) {
			case 'info-user':
			if(!isset($_COOKIE['id_user']) || empty($_COOKIE['id_user'])){
				header("Location:login");
			}
			$info_user=$this->info->getInfo_user($_COOKIE['id_user']);
			foreach ($info_user as $key => $value) {
				if(!isset($value['email']) || !isset($value['phone']) || !isset($value['address'])){
					header("Location:update-info");
				}
			}

			$info_order=$this->info->getOrder_Id($_COOKIE['id_user']);
				// echo "<pre>";
				// print_r($info_order);
				// echo "</pre>";

			include_once "views/information/infor-user.php";
			break;

			case 'login':
			if(isset($_COOKIE['id_user']) && isset($_COOKIE['name_user'])){
				header("Location:../home");
			}
			if(isset($_POST['submit_login'])){ //Đăng nhập bình thường thì
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
						setcookie('id_user', $value['id_user'], time() + (90* 86400*100),'marvel/marvel-shop/');
						setcookie('name_user', $value['name_user'], time() + (90* 86400*100),'marvel/marvel-shop/');
					}
					echo "ok";
					header("Location:info-user");
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
					setcookie('user_imageFB',$_SESSION['user_imageFB'] , time() + (90* 86400*100),'marvel/marvel-shop/');

				}
				if(!empty($facebook_user_info['name']))
				{
					$_SESSION['user_nameFB'] = $facebook_user_info['name'];

				}

					//Kiểm tra xem có tồn tại tài khoản chứa ID FB này không.
				$user_FB=$this->info->get_User_FB($_SESSION['user_idFB']);
				if(count($user_FB)==0){
					$pass=md5(base64_encode($_SESSION['user_idFB']));
					$add_user_FB=$this->info->add_User_FB($_SESSION['user_idFB'],$_SESSION['user_nameFB'],$pass);
					$id_last=$this->info->lastInsertId();
					setcookie('id_user',$id_last, time() + (90* 86400*100),'marvel/marvel-shop/');
					setcookie('name_user',$_SESSION['user_nameFB'], time() + (90* 86400*100),'marvel/marvel-shop/');
					header("Location:info/info-user");

				}else{
		// echo "<pre>";
		// 				print_r($user_FB);
		// 				echo "</pre>";
					foreach ($user_FB as $key => $value) {
						setcookie('id_user',$value['id_user'], time() + (90* 86400*100),'marvel/marvel-shop/');
						setcookie('name_user',$value['name_user'], time() + (90* 86400*100),'marvel/marvel-shop/');
						header("Location:info/info-user");
					}
				}


			}else{
 // Get login url
    $facebook_permissions = ['email']; // Optional permissions

    $facebook_login_url = $facebook_helper->getLoginUrl('marvel/marvel-shop/info/login', $facebook_permissions);
    
    // Render Facebook login button
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="images/login_FB.png" style="width:220px;" /></a></div>';
}


// --------------END LOGIN FB

include_once "views/information/user-login.php";
break;

case 'logout':

setcookie('id_user','',(time()-999999999999999999999999999999999999999),'marvel/marvel-shop/');
setcookie('name_user','',(time()-999999999999999999999999999999999999999),'marvel/marvel-shop/');
setcookie('user_imageFB','',(time()-999999999999999999999999999999999999999),'marvel/marvel-shop/');
session_destroy();



header("Location:../home");

break;
				//logout từ trang checkout
case 'logout1':

setcookie('id_user','',(time()-999999999999999999999999999999999999999),'marvel/marvel-shop/');
setcookie('name_user','',(time()-999999999999999999999999999999999999999),'marvel/marvel-shop/');
setcookie('user_imageFB','',(time()-999999999999999999999999999999999999999),'marvel/marvel-shop/');

session_destroy();
header("Location:../cart");

break;
case 'register':
if(isset($_POST['submit_register'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=md5(base64_encode($_POST['pass']));
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$captcha = $_POST['g-recaptcha-response']; 

	$rs_email=$this->info->getInfo_user_as_email($email);
	$rs_phone=$this->info->getInfo_user_as_phone($phone);

						// echo "<pre>";
						// print_r($rs_email);
						// echo "</pre>";
						// echo "<pre>";
						// print_r($rs_phone);
						// echo "</pre>";
	if(!$captcha){
		$_SESSION['noti_regis']=5;
	}else{
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeR_8kZAAAAANuTHs9pWgZ-O4V4gIqdG512hhfR&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$js_responsive = json_decode($response);

	        // echo $response; die();

			// echo "<pre>";
			// print_r($response);
			// echo "</pre>"; 

	        if($js_responsive->success == false){ // true is oke
	        	$_SESSION['noti_regis']=6;
	        }else{
	        	if(count($rs_email)!=0){
	        		$_SESSION['noti_regis']=1;
	        	}else if(count($rs_phone)!=0){
	        		$_SESSION['noti_regis']=2;
	        	}else{
	        		$add_user=$this->info->add_User($name,$phone,$email,$address,$pass);
	        		if($add_user){
	        			$_SESSION['noti_regis']=3;
	        			header("Location:login");
	        		}else{
	        			$_SESSION['noti_regis']=4;
	        		}
	        	}

	        	
	        }
	    }



	}

	include_once "views/information/user-register.php";
	break;	

case 'update-info'://Trang bổ sung lại thông tin cá nhân của tài khoản
if(!isset($_COOKIE['id_user']) || empty($_COOKIE['id_user'])){
	header("Location:../home");
}
$check_info=$this->info->getInfo_user($_COOKIE['id_user']);
foreach ($check_info as $key => $value) {
	if(isset($value['email']) && isset($value['phone']) && isset($value['address'])){
		header("Location:info-user");
	}
}
if(isset($_POST['submit_update_info'])){
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];

	$rs_email=$this->info->getInfo_user_as_email($email);
	$rs_phone=$this->info->getInfo_user_as_phone($phone);


	if(count($rs_email)!=0){
		$_SESSION['noti_updateinfor']=1;
	}else if(count($rs_phone)!=0){
		$_SESSION['noti_updateinfor']=2;
	}else{
		$edit=$this->info->edit_email_phone_address($email,$phone,$address,$_COOKIE['id_user']);
		if($edit){
			$_SESSION['noti_updateinfor']=4;
		}else{
			$_SESSION['noti_updateinfor']=3;
		}
	}

}


include_once "views/information/update-inforuser.php";
break;



case 'checkout':
			//Nếu k tồn tại ss cart đá về trang chủ
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
	header("Location:../home");
}




if (isset($_COOKIE['id_user']) && isset($_COOKIE['name_user'])) {

			$rs_checkout = $this->info->getInfo_user($_COOKIE['id_user']);// lấy thông tin đăng nhập của người dùng
			foreach ($rs_checkout as $key => $value) {//Nếu thông tin tài khoản chưa đầy đủ,bắt bổ sung
				if(!isset($value['email']) || !isset($value['phone']) || !isset($value['address'])){
					header("Location:update-info");
				}
			}
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
			include_once 'PHPMailer/class.phpmailer.php';
			include_once 'PHPMailer/class.smtp.php'; 
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
			<p>Một lần nữa, trân trọn cảm ơn Anh/Chị đã tin tưởng và đồng hành cùng Marvel Store. hy vọng hệ thống sẽ được tiếp đón Anh/Chị trong thời gian tới!</p>
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
		include_once 'PHPMailer/class.phpmailer.php';
		include_once 'PHPMailer/class.smtp.php'; 
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
		<p>Một lần nữa, trân trọn cảm ơn Anh/Chị đã tin tưởng và đồng hành cùng Marvel Store. hy vọng hệ thống sẽ được tiếp đón Anh/Chị trong thời gian tới!</p>
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

	if (isset($_COOKIE['id_user']) || !empty($_COOKIE['id_user'])) {
		header("Location:home");
	}

	if(isset($_POST['submit_forget'])){
		$email=$_POST['email'];

		$check_email=count($this->info->getInfo_user_as_email($email));
		if($check_email==0){
			$_SESSION['noti_forget']=1;
		}else{
			//tạo ra 1 mã verification_code
			$verification_code=base64_encode($email).time();
echo $verification_code;
			//Thêm hoặc sửa verification trong DB
			$search_email=count($this->info->get_Verification_email($email));
			if($search_email==0){
				$add=$this->info->add_Verification($email,$verification_code);
			}else if($search_email==1){
				$edit=$this->info->update_Verification($email,$verification_code);
			}

			include_once 'PHPMailer/class.phpmailer.php';
			include_once 'PHPMailer/class.smtp.php';

			$resetpass_url='http://localhost/marvel/marvel-shop/info/reset-pass&email='.$email.'&code='.$verification_code;

			$data='<!DOCTYPE html>
			<html lang="en">
			<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Thiết lập mật khẩu</title>
			</head>
			<style type="text/css">
  *{
			font-size: 20px;
			font-family: Arial;
			text-align: left;
		}
		a{
			color: #1666a2;
			text-decoration: none;
		}
		</style>
		<body>
		<div id="wrapper" style="width: 800px;margin: 0px auto;">
		<h2 style="font-size: 30px;color: #F12828;">MarlvelStore</h2><br>
		<p style="font-size: 25px;">Thiết lập mật khẩu</p> <br><p style="color: gray;font-style: italic;">Click vào đường dẫn dưới đây để thiết lập mật khẩu tài khoản của bạn tại <a href="" style="">Marvelstore.</a> Nếu bạn không có yêu cầu thay đổi mật khẩu, xin hãy xóa email này để bảo mật thông tin.</p><br>
		<a href="'.$resetpass_url.'" style=""><button style="color: white;background: #1666a2;border-radius: 8px;padding: 20px 25px;cursor: pointer;
		">Thiết lập mật khẩu</button></a>  hoặc  <a style="text-decoration:none;" href="http://localhost/PHP0320E2/marvel-store/marvel-shop/index.php"><span style="font-style: italic;"> Đến cửa hàng của chúng tôi</span></a>
		<hr>
		<p style="color: gray;font-style: italic;">Nếu bạn có bất cứ câu hỏi nào, đừng ngần ngại liên lạc với chúng tôi tại <a href="mailto:lamtiensink98@gmail.com"><span style="">lamtiensink98@gmail.com</span></a></p>

		</div>

		</body>
		</html>';

		$mail = new PHPMailer(true);
		try {
						//Server settings
			$mail->CharSet   = 'UTF-8';
						$mail->SMTPDebug = 0;// Enable verbose debug output
						$mail->isSMTP();// Send using SMTP
						$mail->Host       = 'smtp.gmail.com';// Set the SMTP server to send through
						$mail->SMTPAuth   = true;// Enable SMTP authentication
						$mail->Username   = 'ngocduc24021997@gmail.com';// SMTP username
						$mail->Password   = 'ngocduc2402';// SMTP password
						$mail->SMTPSecure = 'tls';
						// Enable TLS encryption;`PHPMailer::ENCRYPTION_SMTPS`encouraged
						$mail->Port = 587;// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

						//Recipients
						$mail->setFrom('marvel-shop@gmail.com', 'Marvel Store-Thế giới đồ chơi số 1 tại Việt Nam');// tên của tài khoản để hiển thị email.
						$mail->addAddress($email);// email và tên người nhận

						// Content
						$mail->isHTML(true);// Set email format to HTML
						$mail->Subject = 'THIẾT LẬP LẠI MẬT KHẨU';
						$mail->Body    = $data;

						$mail->send();
						$_SESSION['noti_forget']=2;
					} catch (Exception $e) {
						$_SESSION['noti_forget']=3;
					}
				}
			}
			include_once "views/information/forget-pass.php";
			break;

			case 'reset-pass':
			if (isset($_COOKIE['id_user']) || !empty($_COOKIE['id_user'])) {

				header("Location:../home");
			}

			if(isset($_GET['email']) && isset($_GET['code'])){
				$email=$_GET['email'];
				$verification_code=$_GET['code'];
			}else{

				header("Location:home");
			}
			$check_url=$this->info->get_Verification_email_code($email,$verification_code);
			if(count($check_url)!=1){
				$_SESSION['noti_resetpass']=1;
			}else{
		// echo "<pre>";
		// print_r($check_url);
		// echo"</pre>";

				foreach ($check_url as $key => $value) {
					$time_created=strtotime($value['last_created']);
			// echo $time_created."<br>";
					$time=time();
			// echo $time."<br>";
			if($time-$time_created>600){//Nếu quá 10 phút thì thông báo mail hết hiệu lực
				$_SESSION['noti_resetpass']=2;
			}else{
				$_SESSION['noti_resetpass']=3;

				if(isset($_POST['submit_resetpass'])){
					$pass=md5(base64_encode($_POST['pass']));

					$update=$this->info->update_PassUser_email($email,$pass);
					if($update){
						$del_verification=$this->info->del_Verification($verification_code);
						echo "<script>alert('Thiết lập mật khẩu thành công');</script>";
						echo "<script>window.location.href='index.php?page=info&method=login';</script>";
					}else{
						echo "<script>alert('Thất bại! Có lỗi trong quá trình xử lý');</script>";
						echo "<script>window.location.href='index.php?page=info&method=login';</script>";
					}
				}
			}
		}
	}

	include_once "views/information/reset-pass.php";
	break;


	case 'change-pass':
	if(!isset($_COOKIE['id_user']) || isset($_COOKIE['user_imageFB'])){
		header("Location:home");
	}

	if(isset($_POST['submit_changepass'])){
		$old_pass=md5(base64_encode($_POST['old_pass']));
		$pass=md5(base64_encode($_POST['pass']));

		$check_pass=count($this->info->getInfo_user_id_pass($_COOKIE['id_user'],$old_pass));
			// echo "<pre>";
			// print_r($check_pass);
			// echo "</pre>";
		if($check_pass!=1){
			$_SESSION['noti_changepass']=1;
		}else{
			$change=$this->info->update_PassUser_id_user($_COOKIE['id_user'],$pass);
			if($change){
				$_SESSION['noti_changepass']=2;
			}else{
				$_SESSION['noti_changepass']=3;
			}
		}
	}
	include_once "views/information/changepass.php";
	break;

	case 'tutorial': //Trang hướng dẫn mua hàng
	$get_news = $this->info->get_new();
	include_once "views/information/how-buy.php";
	break;
	case 'how-buy':
	$get_news = $this->info->get_new();
			// echo '<pre>';
			// print_r($get_news);
	include_once 'views/information/detail-how-buy.php';
	break;
	case 'contact': //Trang liên hệ
	if(isset($_POST['submit_contact'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$contact=$_POST['contact'];

		$add=$this->info->add_contact($name,$email,$phone,$contact);
		if($add){
			$_SESSION['noti_contact']=1;
		}else{
			$_SESSION['noti_contact']=2;
		}
	}
	include_once "views/information/contact.php";
	break;


	default:
	header("Location:home");
	break;
}
}
}









?>