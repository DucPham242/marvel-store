
<div class="container">
		<div class="row"  >
			<ol class="breadcrumb" >
				<li>Trang chủ</li>
				<li>Tài khoản</li>
				<li>Đăng kí</li>
			</ol>
		</div>
		<?php 
		if(isset($_SESSION['noti_regis']) && $_SESSION['noti_regis']==1){
			?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Email đã tồn tại, vui lòng nhập email khác!</strong>
		</div>
			<?php
		}else if(isset($_SESSION['noti_regis']) && $_SESSION['noti_regis']==2){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Số điện thoại đã tồn tại, vui lòng chọn số khác !</strong>
			</div>
			<?php
		}else if(isset($_SESSION['noti_regis']) && $_SESSION['noti_regis']==4){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thất bại! Có lỗi trong quá trình đăng ký, vui lòng thử lại...</strong>
			</div>
			<?php
		}else if(isset($_SESSION['noti_regis']) && $_SESSION['noti_regis']==5){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Vui lòng nhập mã Captcha</strong>
			</div>
			<?php
		}else if(isset($_SESSION['noti_regis']) && $_SESSION['noti_regis']==6){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>SPAM !</strong>
			</div>
			<?php
		}
		if((isset($_SESSION['noti_regis'])&&$_SESSION['noti_regis']==1) || (isset($_SESSION['noti_regis'])&&$_SESSION['noti_regis']==2) || (isset($_SESSION['noti_regis'])&&$_SESSION['noti_regis']==4) || (isset($_SESSION['noti_regis'])&&$_SESSION['noti_regis']==5) || (isset($_SESSION['noti_regis'])&&$_SESSION['noti_regis']==6)){
			unset($_SESSION['noti_regis']);
		}
		?>
		<h4 style="text-align: center;color: red" id="check"></h4>
		<div class="row">
			<div class="col-md-4 col-md-push-4 col-xs-12" style="padding:10px;border: 1px solid #807878; margin-bottom: 20px">
				<form action="" onsubmit="return Validate_addUser();" method="POST">
					<h3 class="adjust-text-form">Đăng kí</h3>

					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								 <span class="glyphicon glyphicon-user"></span>
							</span>

							<input type="text" name="name" id="name" onblur="blur_name()" class="form-control" placeholder="Họ tên ..." value="<?php if(isset($name)){ echo $name;} ?>">

						</div>
					</div>
					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								 <span class="glyphicon glyphicon-phone"></span>
							</span>

							<input type="text" name="phone" onblur="blur_phone()" class="form-control" id="phone" placeholder="Số điện thoại ..." value="<?php if(isset($phone)){ echo $phone;} ?>">

						</div>
					</div>
					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								 <span class="glyphicon glyphicon-globe"></span>
							</span>

							<input type="text" name="address" onblur="blur_addr()" class="form-control" id="address" placeholder="Địa chỉ ..." value="<?php if(isset($address)){ echo $address;} ?>">

						</div>
					</div>


					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								 <span class="glyphicon glyphicon-envelope"></span>
							</span>

							<input type="text" name="email" onblur="blur_email()" class="form-control" id="email" placeholder="Nhập email..." value="<?php if(isset($email)){ echo $email;} ?>">

						</div>
					</div>

					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</span>

							<input type="password" class="form-control" onblur="blur_pass()" name="pass" id="pass" placeholder="Nhập password...">

						</div>
					</div>
					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</span>

							<input type="password" name="repass" onblur="blur_repass()" id="repass" class="form-control" placeholder="Nhập lại password...">

						</div>
					</div>
					<div class="g-recaptcha" data-sitekey="6LeR_8kZAAAAAPo83FgNmlu926D0x-Oyv7A6Q6yQ"></div>
					<div  class="submit-user">
						 <input type="submit" value="Đăng Kí"  name="submit_register" class="form-control">
					</div>

					<a href="info/login" style="text-decoration: none;color: red">Quay lại</a>

				</form>
			</div>
		</div>
	</div>