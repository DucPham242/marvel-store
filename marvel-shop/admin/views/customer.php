
<!-- START Main-Content -->
<!-- Tìm kiếm -->
<form action="" method="POST" role="form" >

	<div class="form-group" >
		<input type="text" name="key_user" class="form-control col-md-11" id="" placeholder="Tìm kiếm khách hàng" value="<?php if(isset($_SESSION['key_user'])){ echo str_replace('%', '', $_SESSION['key_user']);} ?>"><button type="submit" name="search_user" class="btn btn-default col-md-1">Tìm kiếm</button><br><br><br>
	</div>
</form>
<!-- END Tìm kiếm -->
<?php 
// echo "<pre>";
// print_r($rs);
// echo "</pre>";
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">
	Thêm mới khách hàng
</button>
<?php if(isset($_SESSION['noti_addUser'])&&$_SESSION['noti_addUser']==1){
	?>
	<div class="alert alert-danger alert_user" style="">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Lỗi! Email đã tồn tại</strong> 
	</div>
	<?php
	
} else if(isset($_SESSION['noti_addUser'])&&$_SESSION['noti_addUser']==2){
	?>
	<div class="alert alert-danger alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Lỗi! Số điện thoại đã tồn tại</strong>
	</div>
	<?php
} else if(isset($_SESSION['noti_addUser'])&&$_SESSION['noti_addUser']==3){
	?>
	<div class="alert alert-success alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thêm thành công !</strong>
	</div>
<?php
}else if(isset($_SESSION['noti_addUser'])&&$_SESSION['noti_addUser']==4){
	?>
	<div class="alert alert-danger alert_user">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại! Có lỗi trong quá trình thêm</strong>
	</div>
	<?php
}
unset($_SESSION['noti_addUser']);
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 1000px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm mới user</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form" onsubmit="return Validate_addUser();">
					<legend>Điền thông tin user</legend>
				
					<div class="form-group">
						<label for="">Họ tên khách hàng</label><span id="spanname" class="spanerror"></span>
						<input type="text" name="name_user" class="form-control" id="name" onblur="blur_name();">
					</div>
					<div class="form-group">
						<label for="">Số Điện Thoại</label><span id="spanphone" class="spanerror"></span>
						<input type="phone" name="phone" onkeypress="return onlyNum();" class="form-control" id="phone" onblur="blur_phone();">
					</div>
					<div class="form-group">
						<label for="">Email</label><span id="spanemail" class="spanerror"></span>
						<input type="email" name="email"  class="form-control" id="email" onblur="blur_email()" >
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label><span id="spanpass" class="spanerror"></span>
						<input type="password" name="pass" onkeypress="return RulesPass();"  class="form-control" id="pass" onblur="blur_pass();">
					</div>
					<div class="form-group">
						<label for="">Nhập lại mật khẩu</label><span id="spanrepass" class="spanerror"></span>
						<input type="password" name="repass"  class="form-control" id="repass" onkeypress="return RulesPass();" onblur="blur_repass()">
					</div>

					<div class="form-group">
						<label for="">Địa chỉ</label><span id="spanaddress" class="spanerror"></span>
						<input type="text" name="address"  class="form-control" id="address" onblur="blur_address();">
					</div>

					
				
					<button type="submit" name="add_user" class="btn btn-primary">Thêm</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-backdrop="static" data-keyboard="false">
	Xem lịch sử hoạt động
</button>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document" style="width: 1000px;">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel" style="color: blue;">Lịch sử hoạt động</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover" style="">
					<tbody>
						
						<?php 
						$stt_noti=0;
						foreach ($get_noti_user as $key => $noti) {
							// echo '<pre>';
							// print_r($get_noti_user);
							?>
							<tr>
								<td style="text-align: left;line-height: 40px; "><?php echo $stt_noti +=1; ?></td>
								<td style="text-align: left;color:gray;line-height: 40px; "><?php echo $noti['content_noti']; ?></td>
							</tr>
							<?php
						}
						?>
						
					</tbody>
				</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>

<!-- END MODAL History -->
<!-- Product View Table -->
<div id="tbl_user_boxout">
<div id="tbl_user_boxin">
<h4 class="center_text" style="">Danh Sách Khách Hàng </h4>
<p style="color: red;">Có <?php echo $number; ?> kết quả</p>
<?php 
	if(count($rs)<1){
			echo "<span style='color:red;'>Không có sản phầm nào !</span>";
		}else{
 ?>
<table  class="table table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th style="width: 80px;">STT</th>
			<th style="width: 250px;">Họ tên</th>
			<th style="width: 80px;">SĐT</th>
			<th style="width: 250px;">Email</th>
			<th>Địa chỉ</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$stt=$row*($pages-1);
		foreach ($rs as $key => $value) {
			?>
			<tr>
				<td><?php echo $stt+=1; ?></td>
				<td><?php echo $value['name_user']; ?></td>
				<td><?php echo $value['phone']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['address']; ?></td>
				<td>
					<a href="index.php?page=home&views=edit-customer&id=<?php echo $value['id_user']; ?>"><button type="button" class="btn btn-primary" >Sửa</button></a>
					<?php if(isset($_SESSION['id_admin']) && $_SESSION['stt_admin']==1){
						?>
						<button type="button" class="btn_del_user btn btn-danger" value="<?php echo $value['id_user']; ?>">Xóa</button>
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
		<!-- 	Phân trang -->
		<div class="col-md-6 col-md-push-3">
			<ul class="pagination">
				<?php 
				if (isset($_GET['pages']) && $_GET['pages'] > 1) {
					$back = $_GET['pages'] - 1;

					?>
					<li><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $back; ?>">Back</a></li>
					<?php 
				}	
				?>
				<?php
									// echo $pagination;
				for($i = 1; $i <= $pagination; $i++){

					?>
					<li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php 
				}
				?>
				<?php 
				if (isset($_GET['pages']) && $_GET['pages'] < $pagination) {
					$next = $_GET['pages'] + 1;	
					?>
					<li><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $next; ?>">Next</a></li>
					<?php 
				}	
				?>
			</ul>

		</div>
		<!-- END Phân trang -->

