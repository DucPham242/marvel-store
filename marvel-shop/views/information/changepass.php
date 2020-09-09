<div class="container">
<div class="row">
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Tài khoản</li>
			<li>Đổi mật khẩu</li>
		</ol>
	</div>
	<div class="row" style="min-height: 350px;">
		<div class="col-md-4 col-md-push-4 col-xs-12 adjust-form">
			<div style="color: red;" id="check">
				<?php 
					if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==1){
						echo "Mật khẩu hiện tại bạn nhập không đúng !";
					}else if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==2){
						echo "<span style='color:green;'>Đổi mật khẩu thành công !</span>";
					}else if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==3){
						echo "Thất bại! Có lỗi trong quá trình thực hiện";
					}
					unset($_SESSION['noti_changepass']);
				 ?>
			</div>
			<form action="" method="POST" onsubmit="return Validate_ResetPass();"> 
				<h3 class="adjust-text-form">Đổi mật khẩu</h3>
				<div class="form-group">
					<div class="input-group">

						<span class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</span>
						<input type="password" class="form-control" placeholder="Nhập mật khẩu hiện tại..." id="old_pass" name="old_pass">

					</div>
				</div>
				<div class="form-group">
					<div class="input-group">

						<span class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</span>
						<input type="password" class="form-control" placeholder="Nhập mật khẩu mới ..." id="pass" name="pass" onblur="blur_pass();">

					</div>
				</div>
				<div class="form-group">
					<div class="input-group">

						<span class="input-group-addon">
							<span class="glyphicon glyphicon-envelope"></span>
						</span>
						<input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới ..." id="repass" name="repass" onblur="blur_repass();">

					</div>
				</div>
				<div  class="submit-user">
					<input type="submit" value="Thay đổi" name="submit_changepass" class="form-control">
				</div>
			</form>
		</div>
	</div>
</div>
</div>