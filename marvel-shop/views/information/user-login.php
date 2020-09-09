
<div class="container">
		<div class="row"  >
			<ol class="breadcrumb" >
				<li>Trang chủ</li>
				<li>Tài khoản</li>
				<li>Đăng nhập</li>
			</ol>
		</div>
		<?php 
		if(isset($_SESSION['noti_login']) && $_SESSION['noti_login']==1){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông tin đăng nhập không chính xác !</strong>
			</div>
			<?php
		} else if(isset($_SESSION['noti_regis']) && $_SESSION['noti_regis']==3){
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Chúc mừng!</strong> Bạn đã đăng kí thành công!
			</div>
			<?php
		}
		unset($_SESSION['noti_login']);
		unset($_SESSION['noti_regis']);

		 ?>
		<div class="row">
			<div class="col-md-4 col-md-push-4 col-xs-12 adjust-form">
				<form action="" method="POST"> 
					<h3 class="adjust-text-form">Đăng nhập</h3>

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

							<input type="password" name="pass" class="form-control" placeholder="Nhập password...">

						</div>
					</div>
					<div  class="submit-user">
						 <input type="submit" name="submit_login" value="Đăng nhập" class="form-control">
					</div>
					<a href="info/forget" style="text-decoration: none;color: red">Quên mật khẩu?</a> <span> hoặc <a href="info/register" style="text-decoration: none;color: red">Đăng ký</a>
						<hr>

						<?php 
							if(isset($facebook_login_url))
    {
     echo $facebook_login_url;
    }

						 ?>

				</form>
			</div>
		</div>
	</div>