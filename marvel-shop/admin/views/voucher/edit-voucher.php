<div class="col-md-10 col-md-push-1">
	<form action="" method="POST" role="form" onsubmit="return Validate_voucher();">
		<legend>Sửa thông tin Voucher</legend>
	<?php 
	foreach ($rs as $key => $value) {
		?>
		<div class="form-group">
			<label for="">ID</label>
			<input type="text" class="form-control" id="" readonly=""  value="<?php echo $value['id_voucher']; ?>">
		</div>
		<div class="form-group">
			<label for="">CODE</label><span id="spanaddress" class="spanerror"></span>
			<input type="text" class="form-control" name="code_voucher" id="address" onblur="blur_address();"   value="<?php echo $value['code_voucher']; $_SESSION['OLD_code_voucher']=$value['code_voucher']; ?>">
		</div>
		<div class="form-group">
			<label for="">Áp dụng cho đơn hàng có trị giá từ</label><span id="span_orderprice" class="spanerror"></span>
			<input type="number" class="form-control" name="apply_for" id="orderprice" onblur="BlurOrderPrice();"  onkeypress="return onlyNum()" value="<?php echo $value['apply_for']; ?>">
		</div>
		<div class="form-group">
			<label for="">Số ngày code tồn tại (*/ngày)</label><span id="spand_timeapply" class="spanerror"></span>
			<input type="number" class="form-control" name="time_apply" id="timeapply" onblur="Blurtimeapply();"   onkeypress="return onlyNum()" value="<?php echo $value['time_apply']; ?>">
		</div>
		<div class="form-group">
			<label for="">% giảm giá</label><span id="spandiscount" class="spanerror"></span>
			<input type="number" class="form-control" name="discount" id="discount" onblur="Blurdiscount();"  onkeypress="return onlyNum()" value="<?php echo $value['discount']; ?>">
		</div>
		<div class="form-group">
			<label for="">Ngày khởi tạo</label>
			<input type="text" class="form-control" name="created" id=""   readonly="" value="<?php echo $value['created']; ?>">
		</div>
		<?php
	}
	 ?>
		<button type="submit" class="btn btn-primary" name="edit_voucher">Cập nhật</button>
	</form>
					
</div>