
<!-- START Main-Content -->
<br><br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">
	Thêm mới thành viên
</button> 
<?php if(isset($_SESSION['noti_addAdmin'])&&$_SESSION['noti_addAdmin']==1){
	?>
	<div class="alert alert-danger alert_user" style="display: inline;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại! Số điện thoại đã có người sử dụng</strong> 
	</div>
	<?php
	
} else if(isset($_SESSION['noti_addAdmin'])&&$_SESSION['noti_addAdmin']==2){
	?>
	<div class="alert alert-danger alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại! Email đã có người sử dụng</strong>
	</div>
	<?php

}else if(isset($_SESSION['noti_addAdmin'])&&$_SESSION['noti_addAdmin']==3){
	?>
	<div class="alert alert-success alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thêm thành công !</strong>
	</div>
	<?php
}else if(isset($_SESSION['noti_addAdmin'])&&$_SESSION['noti_addAdmin']==4){
	?>
	<div class="alert alert-danger alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại! Có lỗi trong quá trình thêm</strong>
	</div>
	<?php
}
unset($_SESSION['noti_addAdmin']);
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document" style="width: 700px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm mới thành viên</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form" onsubmit="return Validate_admin();">
					<legend>Điền thông tin thành viên</legend>
				
					<div class="form-group">
						<label for="">Họ tên</label><span id="spanname" class="spanerror"></span>
						<input type="text" name="name" class="form-control" id="name" value="<?php if(isset($name_admin)){echo $name_admin;} ?>" onblur="blur_name();">
					</div>
					<div class="form-group">
						<label for="">SĐT</label><span id="spanphone" class="spanerror"></span>
						<input type="text" name="phone" class="form-control" id="phone" value="<?php if(isset($phone)){echo $phone;} ?>" onkeypress="return onlyNum();" onblur="blur_phone();">
					</div>
					<div class="form-group">
						<label for="">Email</label><span id="spanemail" class="spanerror"></span>
						<input type="text" name="email" class="form-control" id="email" value="<?php if(isset($email)){echo $email;} ?>" onblur="blur_email();" >
					</div>
					<div class="form-group">
						<label for="">Quyền hạn</label><span class="spanerror"></span>
						<select name="stt_admin" id="" class="form-control" value="<?php if(isset($stt_admin)){echo $stt_admin;} ?>">
							<?php 
							foreach ($rs_stt as $key => $stt) {
								?>
								<option value="<?php echo $stt['id_stt']; ?>"><?php echo $stt['name_stt']; ?></option>
								<?php
							}
							 ?>
						</select>
					</div>
				
					
				
					<button type="submit" name="add_admin" class="btn btn-primary">Thêm</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal -->


<!-- Product View Table -->
<h4 class="center_text" >Danh Sách Thành Viên Quản Trị </h4>
<div id="tbl_admin_boxout">
	<div id="tbl_admin_boxin">
		<?php 

		if(count($rs)<1){
			echo "<span style='color:red;'>Hiện không có thành viên nào !</span>";
		}else{



			?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>STT</th>
						<th>Họ tên</th>
						<th>Số điện thoại</th>
						<th>Email</th>
						<th>Quyền hạn</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$stt=0;
					foreach ($rs as $key => $value) {

						?>
						<tr>
							<td ><?php echo $stt+=1; ?></td>
							<td><?php echo $value['name_admin']; ?></td>
							<td><?php echo $value['phone']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td ><?php echo $value['name_stt']; ?></td>
							<td>
								<a href="index.php?page=home&views=edit-adminmember&id=<?php echo $value['id_admin']; ?>"><button type="button" class="btn_edit_product btn btn-primary" value="<?php echo $value['id_product']; ?>"  >Sửa</button></a>
								<?php 
								if($_SESSION['stt_admin']==1){
								 ?>
								 <button type="button" value="<?php echo $value['id_admin']; ?>" class="btn_del_admin btn btn-danger">Xóa</button>
								 <?php
								}
								?>
							</td>
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
		


