<form action="" method="POST" role="form" style="width: 80%;margin: 0px auto;" onsubmit="return Validate_editOrder();">
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
		<label for="">Tên người nhận</label><span id="spanname" class="spanerror" ></span>
		<input type="text" class="form-control" name="name" id="name" placeholder="" value="<?php echo $value['name']; ?>" onblur="blur_name();" >
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
		<input type="number" class="form-control" name="total" id="" placeholder="Input field" value="<?php echo $value['total']; ?>" onkeypress="onlyNum();">
	</div>
	<div class="form-group">
		<label for="">Số điện thoại liên hệ</label><span id="spanphone" class="spanerror"></span>
		<input type="number" name="phone" class="form-control" id="phone" placeholder="Input field" value="<?php echo $value['phone']; ?>" onkeypress="onlyNum();" onblur="blur_phone();">
	</div>
	<div class="form-group">
		<label for="">Email liên hệ</label><span id="spanemail" class="spanerror"></span>
		<input type="email" name="email" class="form-control" id="email" placeholder="Input field" value="<?php echo $value['email']; ?>" onblur="blur_email();" >
	</div>
	<div class="form-group">
		<label for="">Địa chỉ nhận hàng</label><span id="spanaddress" class="spanerror"></span>
		<input type="text" class="form-control" id="address" name="address" placeholder="Input field" value="<?php echo $value['address']; ?>" onblur="blur_address();">
	</div>
	<div class="form-group">
		<label for="">Ghi chú</label>
		<textarea class="form-control" name="note" id="" cols="30" rows="5" style="resize: none;"><?php echo $value['note']; ?></textarea>
	</div>
	<div class="form-group">
		<label for="">Tình trạng</label>
		<select name="stt" id="" class="form-control" disabled="">
			<?php 
				foreach ($rs_stt as $key => $stt) {
					?>
					<option value="<?php echo $stt['id_stt']; ?>" <?php if($stt['id_stt']==$value['stt']){echo "selected";} ?>><?php echo $stt['name_stt']; ?></option>
					<?php
				}
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Ngày đặt</label>
		<input type="text" class="form-control" name="date_order" id="" placeholder="Input field" value="<?php echo $value['date_order']; ?>" readonly="">
	</div>
	<div class="form-group">
		<label for="">Ngày chốt đơn</label>
		<input type="text" class="form-control" name="date_order" id=""  value="<?php echo $value['order_done']; ?>" readonly="">
	</div>
	<div class="form-group">
		<label for="">Cập nhật lần cuối</label>
		<input type="text" class="form-control" name="last_update" id="" placeholder="Input field" value="<?php echo $value['last_update']; ?>" readonly="">
	</div>


			<?php
		}

	 ?>
	 <div class="form-group">
		<label for="">Lịch sử cập nhật</label>
		<div style="overflow: scroll; width: 100%;height: 200px;" >
			<?php 
			$sx=0;
			foreach($rs_noti as $key => $noti) {
				?>
				<label for="" style="color: red;"><?php  echo $sx+=1.;echo "."; ?></label>
				<p><?php echo $noti['content_noti']; ?></p><hr>
				<?php
			}
			 ?>
		</div>
	</div>
	




	<button type="submit" name="edit_order" class="btn btn-primary">Cập nhật</button>
</form>			