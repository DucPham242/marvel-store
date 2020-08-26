<div class="container">
		<div class="row"  >
			<ol class="breadcrumb" >
				<li>Trang chủ</li>
				<li>Tài khoản</li>
				
			</ol>
		</div>

		<div class="row">
			<div class="col-md-12">
	
			<div class="col-md-4 col-xs-12">
				<a href="index.php?page=info&method=logout" style="margin-top: 40px"><i  class="fa fa-sign-out iconfa_user" aria-hidden="true">Thoát</i></a>

					<div class="userbox" style="width: 300px;padding-left: 10px;position: relative;min-height: 250px;padding-bottom: 20px;margin-bottom: 40px">
						<?php foreach ($info_user as $key => $info) {
							
						 ?>
						<p>Họ tên: <?php echo $info['name_user']; ?></p>	
						<p>Email: <?php echo $info['email']; ?></p>
						<p>Điện thoại: <?php echo $info['phone']; ?></p>
						<div id="address_box"><p id="address">Địa chỉ: <?php echo "<span style='color: gray;font-style: italic;'>".$info['address']."</span>"; ?></p></div>
						<a href="#" id="edit_address" class="" style="position: absolute;right:10px;bottom:20px;"><i class="fa fa-share fa-1x iconfa_user" aria-hidden="true"  > Sửa địa chỉ</i></a>
						<?php 
							}
						?>
					</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<h4>Tài khoản của bạn:</h4>
				<div class="userbox">
					<table class="table table-striped table-hover" id="tbl_ordered" style="" >
						<thead>
							<tr>
								<th>STT</th>
								<th>Mã đơn hàng</th>
								<th>Ngày đặt</th>
								<th>Trạng thái</th>
								<th>Tổng tiền</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$stt=0;
							foreach ($info_order as $key => $value) {
								?>
							<tr>
								<td><?php echo $stt+=1; ?></td>
								<td><?php echo $value['id_order']; ?></td>
								<td><?php echo $value['date_order']; ?></td>
								<td><?php echo $value['name_stt']; ?></td>
								<td class="span_price"><?php echo number_format($value['total']).' đ'; ?></td>
								<td><button type="button" class="check_detail_order btn btn-default" data-toggle="modal" data-target="#exampleModal" value="<?php echo $value['id_order']; ?>">Xem chi tiết</button></td>
							</tr>
								<?php
							}
						 ?>


						</tbody>
					</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 
</div>
<!-- END Modal -->
				</div>
		</div>
			</div>
		</div>

	</div>