
<!-- START Main-Content -->

<!-- Tìm kiếm -->
<form action="" method="POST" role="form" >

	<div class="form-group" >
		<input type="text" class="form-control col-md-11" id="" placeholder="Tim kiếm đơn hàng" name="key_order" value="<?php if(isset($_SESSION['key_order'])){ echo str_replace('%', '', $_SESSION['key_order']);} ?>"><button type="submit" class="btn btn-default col-md-1" name="search_order" >Tìm kiếm</button><br><br><br>


	</div>
</form>
<!-- END Tìm kiếm -->

<!-- MODAL History -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
	Xem lịch sử hoạt động
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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
						foreach ($rs_noti as $key => $noti) {
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

<h4 class="center_text">Danh Sách Đơn Hàng </h4>
<div id="table_order_boxout">
	<div id="table_order_boxin">
		<p style="color: red;">Có <?php echo $number; ?> kết quả</p>
		<?php 

		if(count($rs)<1){
			echo "<span style='color:red;'>Không có đơn hàng nào !</span>";
		}else{
			?>
			<table class="table table-hover" id="">
				<thead>
					<tr>
						<th>STT</th>
						<th>ID</th>
						<th>Tên người nhận</th>
						<th>SĐT Liên hệ</th>
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
							<td><?php echo $value['id_order']; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['phone']; ?></td>
							<td style="color: red;"><?php echo number_format($value['total'])." đ"; ?></td>
							<td style="width: 80px;">
								<select name="" id="order<?php echo $value['id_order']; ?>"  onchange="updateSTT_Order(<?php echo $value['id_order']; ?>);">
									<?php 
									foreach ($rs_stt as $key => $stt) {
										?>
										<option value="<?php echo $stt['id_stt']; ?>" <?php if($stt['id_stt']==$value['stt']){echo "selected";} ?> ><?php echo $stt['name_stt']; ?></option>
										<?php
									}
									?>
								</select>
							</td>
						<!-- 	<td style="width: 80px;">
								<select name="" id="<?php echo $value['id_order']; ?>"  onchange="updateSTT_Orders(<?php echo $value['id_order']; ?>);">
									<?php 
									foreach ($rs_stt as $key => $stt) {
										?>
										<option value="<?php echo $stt['id_stt']; ?>" <?php if($stt['id_stt']==$value['stt']){echo "selected";} ?> ><?php echo $stt['name_stt']; ?></option>
										<?php
									}
									?>
								</select>
							</td> -->
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
							<td><button type="button" class="btn_detail_order btn btn-info" data-toggle="modal" data-target="#exampleModal-2" data-backdrop="static" data-keyboard="false" value="<?php echo $value['id_order']; ?>">Xem đơn</button><br></td>
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>
			<?php 
		}
		?>
	</div>
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
				if ($i > $current - 3 && $i < $current + 3) {
					?>
					<li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php 
				}
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

<!-- --Noti-- -->
<div class="col-md-10 col-md-push-1" style="margin-top: 150px;">
	<table class="table table-hover">
		<legend style="color: red;">Lịch sử hoạt động:</legend>
		<tbody id="body_noti">
			<div from="0" class="div_from">
				<?php
				$stt=0;
				foreach ( $rs_noti as $key => $noti) {
					$stt+=1;
					?>
					<tr>
						<td class="td_noti"><?php echo $stt.'. '.$noti['content_noti']; ?></td>
					</tr>

					<?php
				}if(count($rs_noti_next)>=1){
					?>
					<td class="more_order"><a href="">Xem thêm</a></td>
					<?php
				}
				?>
			</div>
		</tbody>

	</table>	
</div>
<!-- END noti -->



