<div class="col-md-10 col-md-push-1">
	<form action="" method="POST" role="form" onsubmit="return Validate_editUser();" >
		<legend>Cập nhật thông tin khách hàng</legend>
		<?php 
			foreach ($rs as $key => $user) {
				?>
		<div class="form-group">
			<label for="">ID USER</label>
			<input type="text" name="" class="form-control" value="<?php echo $user['id_user']; ?>" readonly="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">ID FB</label>
			<input type="text" name="" class="form-control" id="" readonly="" value="<?php echo $user['id_fb']; ?>">
		</div>
		<div class="form-group">
			<label for="">Họ tên khách hàng</label><span id="spanname" class="spanerror"></span>
			<input type="text" name="name" class="form-control" id="name"  value="<?php echo $user['name_user']; ?>" onblur="blur_name();">
		</div>
		<div class="form-group">
			<label for="">Số điện thoại</label><span id="spanphone" class="spanerror"></span>
			<input type="number" id="phone" name="phone" class="form-control" value="<?php echo $user['phone']; $_SESSION['phone_user']=$user['phone']; ?>"  onkeypress="return onlyNum();" onblur="blur_phone();">
		</div>
		<div class="form-group">
			<label for="">Email</label><span id="spanemail" class="spanerror"></span>
			<input type="email" id="email" name="email" onblur="blur_email();" class="form-control" value="<?php echo $user['email']; $_SESSION['mail_user']=$user['email']; ?>" <?php if(isset($_SESSION['id_admin']) && $_SESSION['stt_admin']!=1){ echo 'readonly=""'; } ?> >
		</div>
		<div class="form-group">
			<label for="">Địa chỉ</label><span id="spanaddress" class="spanerror"></span>
			<input type="text" name="address" id="address"  onblur="blur_address();" class="form-control" value="<?php echo $user['address']; ?>" >
		</div>
		<div class="form-group">
			<label for="">Thời gian tạo tài khoản</label>
			<input type="text"  class="form-control" value="<?php echo $user['created']; ?>"  readonly="">
		</div>
		<div class="form-group">
			<label for="">Thời gian cập nhật lần cuối</label>
			<input type="text"  class="form-control" value="<?php echo $user['last_update']; ?>"   readonly="">
		</div>
	
				<?php
			}
		 ?>
		
		 <div class="form-group">
		<label for="">Lịch sử cập nhật</label>
		<div style="overflow: scroll; width: 100%;height: 200px;" >
			<?php 
			$sx=0;
			foreach($get__info_noti_user as $key => $noti) {
				?>
				<label for="" style="color: red;"><?php  echo $sx+=1.;echo "."; ?></label>
				<p><?php echo $noti['content_noti']; ?></p><hr>
				<?php
			}
			 ?>
		</div>
	</div>
	
	
		<button type="submit" name="edit_user" class="btn btn-primary">Cập nhật</button>
	</form>
					
</div>