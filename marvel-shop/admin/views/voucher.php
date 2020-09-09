
<!-- START Main-Content -->
<br><br>
<!-- Button trigger modal -->
<?php 
if(isset($_SESSION['stt_admin']) && $_SESSION['stt_admin']==1){
	?>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">
		Thêm mới Voucher
	</button>

	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 500px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm mới mã giảm giá</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form" onsubmit="return Validate_voucher();">
					<legend>Thiết lập mã</legend>
					<div class="form-group">
						<label for="">Code</label><span id="spanaddress" class="spanerror"></span>
						<input type="text" name="code_voucher" class="form-control" id="address" onblur="blur_address();">
					</div>
					<div class="form-group">
						<label for="">Áp dụng cho đơn hàng có trị giá từ</label><span id="span_orderprice" class="spanerror"></span>
						<input type="number" name="apply_for" onkeypress="return onlyNum();" class="form-control" id="orderprice" onblur="BlurOrderPrice();">
					</div>
					<div class="form-group">
						<label for="">Số ngày code tồn tại (*/ngày)</label><span id="spand_timeapply" class="spanerror"></span>
						<input type="number" name="time_apply" onkeypress="return onlyNum();"  class="form-control" id="timeapply" onblur="Blurtimeapply();">
					</div>
					<div class="form-group">
						<label for="">% giảm giá</label><span id="spandiscount" class="spanerror"></span>
						<input type="number" name="discount" onkeypress="return onlyNum();"  class="form-control" id="discount" onblur="Blurdiscount();">
					</div>
		
					<button type="submit" name="add_voucher" class="btn btn-primary">Khởi tạo</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal -->

	<?php
	
}
?>

<?php if(isset($_SESSION['noti_voucher'])&&$_SESSION['noti_voucher']==1){
	?>
	<div class="alert alert-danger alert_user" style="">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Lỗi! Voucher đã tồn tại</strong> 
	</div>
	<?php
	
} else if(isset($_SESSION['noti_voucher'])&&$_SESSION['noti_voucher']==2){
	?>
	<div class="alert alert-success alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thêm thành công !</strong>
	</div>
	<?php
} else if(isset($_SESSION['noti_voucher'])&&$_SESSION['noti_voucher']==3){
	?>
	<div class="alert alert-danger alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại! Có lỗi trong quá trình thêm !</strong>
	</div>
<?php
}
unset($_SESSION['noti_voucher']);
?>


<!-- Product View Table -->
<div id="tbl_voucher_boxout">
	<div id="tbl_voucher_boxin">
		<h4 class="center_text" style="">Danh Sách Mã Giảm Giá </h4>
		<?php 
		if(count($rs)<1){
			echo "<span style='color:red;'>Không có mã giảm giá nào !</span>";
		}else{
			?>
			<table  class="table table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>STT</th>
						<th style="">CODE</th>
						<th style="">Giá đơn áp dụng</th>
						<th style="">Thời gian (ngày)</th>
						<th style="">% giảm giá</th>
						<th>Ngày tạo</th>
						<?php 
							if(isset($_SESSION['stt_admin']) && $_SESSION['stt_admin']==1){
								?>
								<th style="">Action</th>
								<?php
							}
						 ?>
					</tr>
				</thead>
				<tbody>
					<?php 
					$stt=0;
					foreach ($rs as $key => $value) {
						?>
						<tr>
							<td><?php echo $stt+=1; ?></td>
							<td style="color:blue;"><?php echo $value['code_voucher']; ?></td>
							<td style="color:red;"><?php echo number_format($value['apply_for'])." đ"; ?></td>
							<td><?php echo $value['time_apply']." ngày"; ?></td>
							<td><?php echo $value['discount']."%"; ?></td>
							<td><?php echo $value['created']; ?></td>
							<?php 
							if(isset($_SESSION['stt_admin']) &&$_SESSION['stt_admin']==1){
								?>
								<td>
								<a href="index.php?page=home&views=edit-voucher&id=<?php echo $value['id_voucher']; ?>"><button type="button" class="btn btn-primary" >Sửa</button></a>
									<button type="button" class="btn_del_voucher btn btn-danger" value="<?php echo $value['id_voucher']; ?>">Xóa</button>
								
							</td>
								<?php
							}
							 ?>
							
						</tr>
						<?php
					}
					?>


				</tbody>
			</table>
		</div>
	</div>
	<?php 
}
?>

<!-- END Product View Table -->

