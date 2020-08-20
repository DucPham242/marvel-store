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
									<th></th>
									<th>Sản phẩm </th>
									<th>Đơn giá</th>
									<th>Số lượng</th>
									<th>Thành tiền</th>
									<th></th>
								</tr>
							</thead>
							<?php 
							if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
								
							
						?>
						 <h4 style="color: red">Giỏ hàng hiện tại đang trống</h4>
						<?php 
							}else{

								foreach ($_SESSION['cart'] as $key => $cart) {
									
						 ?>
							<tbody>
								<tr>
									<td><img src="images/product/<?php echo $cart['img']; ?>" alt="Ảnh sản phẩm" width="60px"></td>
									<td><?php echo $cart['name_product']; ?></td>
									<?php 
									if ($cart['discount'] <= 0) {
										
									?>
										<td><?php echo $price = $cart['price']; ?></td>
									<?php
									$_SESSION['total']+=$price;
										}else{	
									 ?>
									 	<td><?php echo $price = $cart['discount_price']; ?></td>
									 <?php 
									 $_SESSION['total']+=$price;
									 	}
									 ?>
									
									<form action="" method="POST" role="form">
										<td style="padding-left: 50px;">
											<input type="number" class="form-control" min="1" max="10" id="" style="width: 70px">
										</td></form>
										<td>10,000,000đ</td>
										<td><a href="#">
											<i width="30px"class="glyphicon glyphicon-trash"></i> 
										</a>
									</td>
								</tr>
							</tbody>
							<?php
						}
					 }
					 ?>
						</table>
					
					</div>
				</div>
			</div>
			<!-- end -->
			<!-- show total -->
			<div class="col-md-4">
				<h3>Đơn hàng</h3>
				<div class="shippingbox">
					<h3>Tổng tiền: <?php echo $_SESSION['total']; ?></h3>
					<button type="button" class="btn btn-danger">Thanh Toán</button>
				</div>
			</div>
			<!-- end -->
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="#"><button type="button" class="btn btn-danger">Mua tiếp</button></a>
				<button type="button" class="btn btn-danger">Cập nhật giỏ hàng</button>
			</div>
		</div>
	</div>