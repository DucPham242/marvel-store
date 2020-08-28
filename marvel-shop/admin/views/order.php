
<!-- START Main-Content -->

<!-- Tìm kiếm -->
<form action="" method="POST" role="form" >

	<div class="form-group" >
		<input type="text" class="form-control col-md-11" id="" placeholder="Tim kiếm đơn hàng" name="key_order" value="<?php if(isset($_SESSION['key_order'])){ echo str_replace('%', '', $_SESSION['key_order']);} ?>"><button type="submit" class="btn btn-default col-md-1" name="search_order" >Tìm kiếm</button><br><br><br>


	</div>
</form>
<!-- END Tìm kiếm -->
<?php 
// echo "<pre>";
// print_r($rs);
// echo "</pre>";
// echo "<pre>";
// print_r($rs_stt);
// echo "</pre>";
?> 
<!-- Product View Table -->
<h4 class="center_text">Danh Sách Đơn Hàng </h4>
<div id="table_order_box">
<table class="table table-hover" id="table_order">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên người nhận</th>
			<th>SĐT Liên hệ</th>
			<th>Địa chỉ nhận hàng</th>
			<th>Tổng tiền</th>
			<th>Tình trạng</th>
			<th>Ngày đặt</th>
			<th>Action</th>
			<th>Chi tiết</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sx=$row*($pages-1);
		foreach ($rs as $key => $value) {
			?>
			<tr>
				<td><?php echo $sx+=1; ?></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['phone']; ?></td>
				<td style="width: 250px;"><?php echo $value['address']; ?></td>
				<td style="color: red;"><?php echo number_format($value['total'])." đ"; ?></td>
				<td>
					<select name="" id="<?php echo $value['id_order']; ?>" onchange="updateSTT_Order(<?php echo $value['id_order']; ?>);">
						<?php 
							foreach ($rs_stt as $key => $stt) {
								?>
								<option value="<?php echo $stt['id_stt'] ?>" <?php if($stt['id_stt']==$value['stt']){echo "selected";} ?> ><?php echo $stt['name_stt']; ?></option>
								<?php
							}
						 ?>
					</select>
				</td>
				<td><?php echo $value['date_order']; ?></td>
				<td>
					<a href="index.php?page=home&views=edit-order&id=<?php echo $value['id_order']; ?>"><button type="button" class="btn btn-primary">Sửa</button></a>
					<?php 
					if(isset($_SESSION['stt_admin']) && $_SESSION['stt_admin']==1){
						?>
						<button type="button" class="btn_del_order btn btn-danger" value="<?php echo $value['id_order']; ?>">Xóa</button>
						<?php
					}
					 ?>
					
					

				</td>
				<td><button type="button" class="btn_detail_order btn btn-info" data-toggle="modal" data-target="#exampleModal-2" data-backdrop="static" data-keyboard="false" value="<?php echo $value['id_order']; ?>">Chi tiết</button><br></td>
			</tr>
			<?php
		}
		?>

	</tbody>
</table>
		</div>



<!-- END Product View Table -->

		<!-- 	Phân trang -->
		<div id="pagi_box" >
		<div class="col-md-6 col-md-push-3" id="pagi">
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
		</div>
		<!-- END Phân trang -->

		<!-- Modal 2 -->
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	</div>
	<!-- END Modal -->



