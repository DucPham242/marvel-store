<div class="container" >
	<div class="row">
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Giỏ hàng</li>
		</ol>
	</div>
</div>
<!-- end link cart -->
<!-- show product -->
<div class="container" >
	<div class="row">
		<!-- show product guest picked -->
		<div class="col-md-8">
			<div class="row">
				<h2>Giỏ hàng</h2>
				<div class="row">

					<table class="table table-hover" style=" border: 1px solid #E1E1E1;" border="1px">
						<thead>
							<tr>
								<th>STT</th>
								<th>Sản phẩm </th>
								<th>Đơn giá</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>

							<?php 
							if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
								

								?>
								<h4 style="color: red">Giỏ hàng hiện tại đang trống</h4>

								<?php 
							}else{

								foreach ($_SESSION['cart'] as $key => $cart) {

									
									?>
									<tr>
										<td><img src="images/product/<?php echo $cart['img']; ?>" alt="Ảnh sản phẩm" width="60px"></td>
										<td><?php echo $cart['name_product']; ?></td>
										<?php 
										if ($cart['discount'] <= 0) {

											?>
											<td><?php echo number_format($price = $cart['price']).' đ';  ?></td>
											<?php
										}else{	
											?>
											<td><?php echo number_format($price = $cart['discount_price']).' đ'; ?></td>
											<?php 
										}
										?>

										
											<td style="">
												<form action="" method="POST" role="form">
												<input type="number" value="<?php echo $cart['qty']; ?>" class="form-control" min="1" max="10" id="" style="width: 70px">
												</form>
											</td>
										
											<td><?php echo number_format($count_price=$cart['qty']*$price).' đ'; ?></td>
											<td><a href="#">
												<i width="30px"class="glyphicon glyphicon-trash"></i> 
											</a>
										</td>
									</tr>

									<?php
								}

							}
							?>
							
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
		<!-- end -->
		<!-- show total -->
		<div class="col-md-4">
			<h3>Đơn hàng</h3>
			<div class="shippingbox">
				<h3>Tổng tiền: <?php echo number_format($_SESSION['total']).' VNĐ'; ?></h3>
				<button type="button" class="btn btn-danger">Thanh Toán</button>
			</div>
		</div>
		<!-- end -->
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-4" style="margin-bottom: 20px;">
			<a href="index.php"><button type="button" class="btn btn-danger">Mua tiếp</button></a>
			<button type="button" class="btn btn-danger">Cập nhật giỏ hàng</button>
		</div>
	</div>
</div>