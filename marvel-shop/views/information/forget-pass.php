<div class="container">
	<div class="row">
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Tài khoản</li>
			<li>Phục hồi mật khẩu</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-push-4 col-xs-12 adjust-form">
			<div style="color: red;" id="check">
				<?php 
				if(isset($_SESSION['noti_forget']) && $_SESSION['noti_forget']==1){
					echo "<span style='color:red'>Email bạn nhập hiện không có trong hệ thống của MARVELSTORE</span>";
				}else if(isset($_SESSION['noti_forget']) && $_SESSION['noti_forget']==2){
					echo "<span style='color:blue'>Vui lòng kiểm tra hòm thư email của bạn để thiết lập lại mật khẩu ! Thời gian hiệu lực của mail là 10 phút.</span>";
				}else if(isset($_SESSION['noti_forget']) && $_SESSION['noti_forget']==3){
					echo "<span style='color:red'>Có lỗi trong quá trình gửi mail !</span>";
				}
				unset($_SESSION['noti_forget']);
				 ?>
			</div>
			<form action="" method="POST" onsubmit="return Validate_forgetPass();"> 
				<h3 class="adjust-text-form">Phục hồi mật khẩu</h3>

				<div class="form-group">
					<div class="input-group">

						<span class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</span>
						<input type="text" class="form-control" placeholder="Nhập email..." onblur="blur_email()" id="email" name="email">

					</div>
				</div>
				<div  class="submit-user">
					<input type="submit" value="Gửi mail" name="submit_forget" class="form-control">
				</div>
				<a href="info/login" style="text-decoration: none;color: red">Hủy</a>
			</form>
		</div>
	</div>
</div>