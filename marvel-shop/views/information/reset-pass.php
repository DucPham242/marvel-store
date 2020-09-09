<div class="container">
<?php 
	if(isset($_SESSION['noti_resetpass']) && $_SESSION['noti_resetpass']==1){
		echo "<div class='container' style='min-height:500px;text-align:center'><h4 style='color:red'>Yêu cầu của bạn không hơp lệ !</h4></div>";
	}else if(isset($_SESSION['noti_resetpass']) && $_SESSION['noti_resetpass']==2){
		echo "<div class='container' style='min-height:500px;text-align:center'><h4 style='color:red'>Yêu cầu của bạn đã hết thời gian hiệu lực !</h4></div>";
	}else if(isset($_SESSION['noti_resetpass']) && $_SESSION['noti_resetpass']==3){
		?>
			<div class="container">
	<div class="row">
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Tài khoản</li>
			<li>Phục hồi mật khẩu</li>
		</ol>
	</div>
	<div class="row" style="min-height: 350px;">
		<div class="col-md-4 col-md-push-4 col-xs-12 adjust-form">
			<div style="color: red;" id="check">
			</div>
			<form action="" method="POST" onsubmit="return Validate_ResetPass();"> 
				<h3 class="adjust-text-form">Phục hồi mật khẩu</h3>

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
					<input type="submit" value="Thay đổi" name="submit_resetpass" class="form-control">
				</div>
			</form>
		</div>
	</div>
</div>
</div>
		<?php
	}
	unset($_SESSION['noti_resetpass']);
 ?>
