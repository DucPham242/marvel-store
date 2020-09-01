<div class="col-md-10 col-md-push-1">
	<form action="" method="POST" role="form">
		<legend>Sửa thông tin Voucher</legend>
	<?php 
	foreach ($rs as $key => $value) {
		?>
		<div class="form-group">
			<label for="">ID</label>
			<input type="text" class="form-control" id="" readonly=""  value="<?php echo $value['id_voucher']; ?>">
		</div>
		<div class="form-group">
			<label for="">CODE</label>
			<input type="text" class="form-control" name="code_voucher" id=""   value="<?php echo $value['code_voucher']; $_SESSION['OLD_code_voucher']=$value['code_voucher']; ?>">
		</div>
		<div class="form-group">
			<label for="">Áp dụng cho đơn hàng có trị giá từ</label>
			<input type="number" class="form-control" name="apply_for" id=""  onkeypress="return onlyNum()" value="<?php echo $value['apply_for']; ?>">
		</div>
		<div class="form-group">
			<label for="">Số ngày code tồn tại (*/ngày)</label>
			<input type="number" class="form-control" name="time_apply" id=""   onkeypress="return onlyNum()" value="<?php echo $value['time_apply']; ?>">
		</div>
		<div class="form-group">
			<label for="">% giảm giá</label>
			<input type="number" class="form-control" name="discount" id=""  onkeypress="return onlyNum()" value="<?php echo $value['discount']; ?>">
		</div>
		<div class="form-group">
			<label for="">Ngày khởi tạo</label>
			<input type="text" class="form-control" name="created" id=""   readonly="" value="<?php echo $value['created']; ?>">
		</div>
		<?php
	}
	 ?>
		<button type="submit" class="btn btn-primary" name="edit_voucher">Submit</button>
	</form>
					
</div>