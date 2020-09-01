<?php 
ob_start();
session_start();
 ?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="">
	<title>Đăng Nhập ~ Marvel Store </title>

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/myCSS.css" />
	<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.ttf" />


</head>

<body style="background: white;">
	<?php 
	include_once"controller/admin_c.php";
	$create=new admin_c();
	if(isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])){
			header("Location:index.php");
		}
	if(isset($_POST['submit_login'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$acc=$create->getAdmin_email($email,$pass);
			// echo "<pre>";
			// print_r($acc);
			// echo "</pre>";

		if(count($acc)!=1){
			$_SESSION['noti_login']=1;
		}
		else{
			foreach ($acc as $key => $value) {
				$_SESSION['id_admin']=$value['id_admin']."<br>";
				$_SESSION['name_admin']=$value['name_admin'];
				$_SESSION['email_admin']=$value['email'];
				$_SESSION['stt_admin']=$value['stt_admin'];
			}
			echo "ok";
			header("Location:index.php");
		}
	}
	?>
	
	<div class="container" >
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-1 col-lg-3"></div>
			<div class="col-md-6 col-sm-6 col-xs-10 col-lg-6" >
				<div class="row" style="">
					<h3  id="logo_text_loginadmin">Marvelstore.vn </h3>
					<h4 id="tittle_text_loginadmin"> Đăng nhập vào chức năng quản trị </h4>
					<hr><br>
					<?php 
					if (isset($_SESSION['noti_login']) && $_SESSION['noti_login']==1) {
						?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Bạn đã nhập sai thông tin</strong>
						</div>
						<?php
						unset($_SESSION['noti_login']);
					}
					 ?>
					<form action="" method="POST" style="width: 400px;margin: 0px auto;"> 
						<h3 class="adjust-text-form" style="text-align: center;">Đăng nhập</h3>

						<div class="form-group">
							<div class="input-group">

								<span class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
								</span>

								<input type="email" name="email" class="form-control" placeholder="Nhập email...">

							</div>
						</div>

						<div class="form-group">
							<div class="input-group">

								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</span>

								<input type="password" name="pass" class="form-control" placeholder="Nhập password..." onkeypress="return RulesPass();">

							</div>
						</div>
						<div  class="submit-user">
							<input type="submit" name="submit_login" value="Đăng nhập" class="form-control">
						</div>
					</form><br>
			






				</div>

			</div>
		</div>
	</div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/MyJava.js"></script>


</body>


</html>