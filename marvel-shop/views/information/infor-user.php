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
						<p >Địa chỉ: <?php echo $info['address']; ?></p>
						<a href="#" class="" style="position: absolute;right:10px;bottom:20px;"><i class="fa fa-share fa-1x iconfa_user" aria-hidden="true"  > Sửa địa chỉ</i></a>
						<?php 
							}
						?>
					</div>
			</div>
			<div class="col-md-8 col-xs-12">
				<h4>Tài khoản của bạn</h4>
				<div class="userbox">
					<table class="table table-striped table-hover" id="tbl_ordered" style="" >
						<thead>
							<tr>
								<th>Mã đơn hàng</th>
								<th>Ngày đặt</th>
								<th>Trạng thái</th>
								<th>Tổng tiền</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11230</td>
								<td>2020-07-18 16:46:20</td>
								<td>Đã đóng gói, chuẩn bị giao hàng</td>
								<td>900,000 VNĐ</td>
								<td><a href="">Chi tiết</a></td>
							</tr>
							<tr>
								<td>11230</td>
								<td>2020-07-18 16:46:20</td>
								<td>Đã đóng gói, chuẩn bị giao hàng</td>
								<td>900,000 VNĐ</td>
								<td><a href="">Chi tiết</a></td>
							</tr>
						</tbody>
					</table>
				</div>
		</div>
			</div>
		</div>

	</div>