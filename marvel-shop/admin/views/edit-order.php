<form action="" method="POST" role="form" style="width: 80%;margin: 0px auto;">
	<legend>Cập nhật thông tin đơn hàng</legend>
	<?php 
		foreach ($rs as $key => $value) {
			?>
	<div class="form-group">
		<label for="">ID đơn hàng</label>
		<input type="text" class="form-control" name="name" id="" placeholder="" value="<?php echo $value['id_order']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">ID User</label>
		<input type="text" class="form-control" name="name" id="" placeholder="" value="<?php echo $value['id_user']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Tên người nhận</label>
		<input type="text" class="form-control" name="name" id="" placeholder="" value="<?php echo $value['name']; ?>">
	</div>

	<div class="form-group">
		<label for="">Phương thức thanh toán</label>
		<select name="payment" id="" class="form-control">
			<?php 
				foreach ($rs_payment as $key => $payment) {
					?>
						<option value="<?php echo $payment['id_payment']; ?>" <?php if($payment['id_payment']==$value['id_payment']){echo "selected";} ?>><?php echo $payment['name_payment']; ?></option>
			
					<?php
				}
			 ?>
			
		</select>
	</div>
	<div class="form-group">
		<label for="">Tổng tiền</label>
		<input type="text" class="form-control" name="total" id="" placeholder="Input field" value="<?php echo $value['total']; ?>">
	</div>
	<div class="form-group">
		<label for="">Số điện thoại liên hệ</label>
		<input type="text" name="phone" class="form-control" id="" placeholder="Input field" value="<?php echo $value['phone']; ?>">
	</div>
	<div class="form-group">
		<label for="">Email liên hệ</label>
		<input type="text" name="email" class="form-control" id="" placeholder="Input field" value="<?php echo $value['email']; ?>">
	</div>
	<div class="form-group">
		<label for="">Địa chỉ nhận hàng</label>
		<input type="text" class="form-control" id="" name="address" placeholder="Input field" value="<?php echo $value['address']; ?>">
	</div>
	<div class="form-group">
		<label for="">Ghi chú</label>
		<textarea class="form-control" name="note" id="" cols="30" rows="5" style="resize: none;"><?php echo $value['note']; ?></textarea>
	</div>
	<div class="form-group">
		<label for="">Ngày đặt</label>
		<input type="text" class="form-control" name="date_order" id="" placeholder="Input field" value="<?php echo $value['date_order']; ?>" readonly="">
	</div>
	<div class="form-group">
		<label for="">Cập nhật lần cuối</label>
		<input type="text" class="form-control" name="last_update" id="" placeholder="Input field" value="<?php echo $value['last_update']; ?>" readonly="">
	</div>
	<div class="form-group">
		<label for="">Tình trạng</label>
		<select name="stt" id="" class="form-control">
			<?php 
				foreach ($rs_stt as $key => $stt) {
					?>
					<option value="<?php echo $stt['id_stt']; ?>" <?php if($stt['id_stt']==$value['stt']){echo "selected";} ?>><?php echo $stt['name_stt']; ?></option>
					<?php
				}
			 ?>
		</select>
	</div>

			<?php
		}

	 ?>
	




	<button type="submit" name="edit_order" class="btn btn-primary">Cập nhật</button>
</form>			