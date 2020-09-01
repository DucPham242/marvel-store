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
	<div  class="submit-user">
		<input type="submit"  value="Hủy" class="form-control">
	</div>
</form>