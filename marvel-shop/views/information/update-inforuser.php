
<div class="container">
	<div class="row"  >
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Tài khoản</li>
			<li>Hoàn thiện thông tin tài khoản</li>
		</ol>
	</div>
	<div class="row" style="height: 80px;">
		<?php 
		if(isset($_SESSION['noti_updateinfor']) && $_SESSION['noti_updateinfor']==1){
			?>
			<div class="alert alert-danger col-md-4 col-md-push-4" style="display: inline;">
				<strong>Email bạn nhập đã có người sử dụng</strong>
			</div>
			<?php
		}else if(isset($_SESSION['noti_updateinfor']) && $_SESSION['noti_updateinfor']==2){
			?>
			<div class="alert alert-danger col-md-4 col-md-push-4" style="display: inline;">
				<strong>Số điện thoại bạn nhập đã có người sử dụng</strong>
			</div>
			<?php
		}else if(isset($_SESSION['noti_updateinfor']) && $_SESSION['noti_updateinfor']==3){
			?>
			<div class="alert alert-danger col-md-4 col-md-push-4" style="display: inline;">
				<strong>Thất bại! Có lỗi trong quá trình cập nhật thông tin</strong>
			</div>
			<?php
		}else if(isset($_SESSION['noti_updateinfor']) && $_SESSION['noti_updateinfor']==4){
			?>
			<div class="alert alert-success col-md-4 col-md-push-4" style="display: inline;">
				<strong>Cập nhật thành công</strong>
			</div>
			<?php
		}
		unset($_SESSION['noti_updateinfor']);

		?>
	</div>
	<div class="row" >
		<h3 class="adjust-text-form" style="color: #F12828;">Vui lòng hoàn thiện thông tin tài khoản</h3>
		<div class="col-md-4 col-md-push-4 col-xs-12" style="padding:10px;border: 1px solid #807878; margin-bottom: 20px">
			<form action="" onsubmit="return Validate_Update_inforUser();" method="POST" >
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
							<span class="glyphicon glyphicon-phone"></span>
						</span>

						<input type="number" name="phone" onblur="blur_phone()" class="form-control" id="phone" placeholder="Số điện thoại ..." onkeypress="return onlyNum();" value="<?php if(isset($phone)){ echo $phone;} ?>">

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

				<div  class="submit-user">
					<input type="submit" value="Hoàn tất"  name="submit_update_info" class="form-control">
				</div>


			</form>
			<h5 style="text-align: center;color: red" id="check"></h5>
		</div>
	</div>
</div>