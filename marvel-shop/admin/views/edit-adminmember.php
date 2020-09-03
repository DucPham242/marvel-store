<div class="col-md-10 col-md-push-1">
	<form action="" method="POST" role="form">
		<legend>Cập nhật thông tin quản trị viên</legend>
	<?php 
		foreach ($rs as $key => $value) {
		?>
			<div class="form-group">
			<label for="">ID</label>
			<input type="text" class="form-control" id="" value="<?php echo $value['id_admin']; ?>">
		</div>
		<div class="form-group">
			<label for="">Họ tên</label>
			<input type="text" class="form-control" id="" name="name_admin" value="<?php echo $value['name_admin']; ?>">
		</div>
		<div class="form-group">
			<label for="">SĐT</label>
			<input type="text" class="form-control" id="" name="phone" value="<?php echo $value['phone']; $_SESSION['OLD_phone_admin']=$value['phone'];?>">
		</div>
		<div class="form-group">
			<label for="">Email</label>
			<input type="text" class="form-control" id="" name="email" value="<?php echo $value['email']; $_SESSION['OLD_email_admin']=$value['email'];?>">
		</div>
		<div class="form-group">
			<label for="">Phân quyền</label>
			<select name="stt_admin" id="" class="form-control">
				<?php 
				foreach ($rs_stt as $key => $stt) {
					?>
					<option value="<?php echo $stt['id_stt']; ?>" <?php if($value['stt_admin']==$stt['id_stt']){echo "selected";} ?>>
						<?php echo $stt['name_stt']; ?>
					</option>
					<?php
				}
				 ?>
			</select>
		</div>
		<div class="form-group">
			<label for="">Ngày tạo</label>
			<input type="text" class="form-control" id=""  value="<?php echo $value['created']; ?>" readonly="">
		</div>
		<div class="form-group">
			<label for="">Cập nhật lần cuối</label>
			<input type="text" class="form-control" id=""  value="<?php echo $value['last_update']; ?>" readonly="">
		</div>
		<?php
		}

	 ?>
	
		
	
		<button type="submit" name="edit_admin" class="btn btn-primary">Submit</button>
	</form>
					
</div>