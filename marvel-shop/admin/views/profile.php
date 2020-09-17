
<!-- START Main-Content -->

<h4 class="center_text">Thông tin tài khoản</h4><hr>
<table class="table table-striped table-hover">
	<?php 
	foreach ($rs as $key => $value) {
		?>
		<tr>
			<td>Họ tên:</td>
			<td><?php echo $value['name_admin']; ?></td>
			<td></td>
		</tr>
		<tr>
			<td>Số điện thoại:</td>
			<td><?php echo $value['phone']; ?></td>
			<td></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><?php echo $value['email']; ?></td>
			<td></td>
		</tr>
		<tr>
			<td id="changepass" style="width: 120px;"><a href="">Đổi mật khẩu</a></td>
			<td id="">
				<span id="noti_changepass" >
					<?php 
					if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==1){
						echo "<span style='color:red'> Mật khẩu hiện tại bạn nhập không đúng !</span>";
					}else if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==2){
						echo "<span style='color:green'> Đổi mật khẩu thành công !</span>";
					}else if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==3){
						echo "<span style='color:red'> Thất bại! Có lỗi trong quá trình đổi mật khẩu</span>";
					}
					unset($_SESSION['noti_changepass']);

					?>
				</span>
			</td>
			<td></td>
		</tr>

		<?php
	}
	?>



</table>
<div id="box_changepass_out">
<div id="box_changepass_in" style="">
	<form method="POST" action="index.php?page=home&views=profile" onsubmit="return Validate_forgetPass();">
		<div class="form-group">
			<div class="input-group">

				<span class="input-group-addon">
					<span class="glyphicon glyphicon-lock"></span>
				</span>

				<input type="password" name="pass" class="form-control" placeholder="Nhập password hiện tại" onkeypress="return RulesPass();">

			</div>
		</div>
		<div class="form-group">
			<div class="input-group">

				<span class="input-group-addon">
					<span class="glyphicon glyphicon-lock"></span>
				</span>

				<input type="password" name="newpass" class="form-control" placeholder="Nhập password mới" id="pass" onblur="blur_pass();" onkeypress="return RulesPass();">

			</div><span id="spanpass" class="spanerror"></span>
		</div>
		<div class="form-group">
			<div class="input-group">

				<span class="input-group-addon">
					<span class="glyphicon glyphicon-lock"></span>
				</span>

				<input type="password" name="re_newpass" class="form-control" placeholder="Nhập  lại password mới" id="repass" onblur="blur_repass();" onkeypress="return RulesPass();">

			</div><span id="spanrepass" class="spanerror"></span>
		</div>
		<div  class="submit-user">
			<input type="submit" name="submit_changepass" value="Đổi mật khẩu" class="form-control">
		</div>
		<a href="#" id="cancel_changepass" style="color: red;">Hủy</a>
	</form>
</div>
</div>
