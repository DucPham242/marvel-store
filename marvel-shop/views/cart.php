
<div class="container" >
		<div class="row">
			<ol class="breadcrumb" >
				<li>Trang chủ</li>
				<li>Giỏ hàng</li>
			</ol>
		</div>
	</div>
	<div id="table-box-cart" style="min-height: 300px">
		<div id="cart-table">
	<!-- end link cart -->
	<!-- show product -->
	<?php 
							if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
								
							
						?>
							<h4 style="color: red; margin: 20px 10px 200px 150px;">Hiện tại chưa có sản phẩm nào!</h4>
						<?php 
						}else
						{
						 ?>
	<div class="container"  id="">
		<div class="row">
			<!-- show product guest picked -->
			<div class="col-md-8">
				<div class="row">
					<h2>Giỏ hàng</h2>
					<div class="row">
						
						
						<div id="table-box-cart">
						<table class="table table-hover" style=" border: 1px solid #E1E1E1;" border="1px" >
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
							<tbody>
							
						 
						<?php 
							

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
									$_SESSION['total']+=$price;
										}else{	
									 ?>
									 	<td><?php echo number_format($price = $cart['discount_price']). ' đ'; ?></td>
									 <?php 
									 	}
									 ?>
									
									<form action="" method="POST" role="form">
										<td style="padding-left: 50px;">
											<input type="number" class="form-control" min="1" max="10" id="" style="width: 70px">
										</td></form>
										<?php 
									if ($cart['discount'] <= 0) {
										
									?>
										<td><?php echo number_format($total = $price * $cart['qty']).' đ';  ?></td>
									<?php
									$_SESSION['total']+=$price;
										}else{	
									 ?>
									 	<td><?php echo number_format($total = $price * $cart['qty']). ' đ'; ?></td>
									 <?php 
									 	}
									 ?>
										<td>
											<button value="<?php echo $cart['id_product']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm không?');" id="alert-del" >
											<i width="30px"class="glyphicon glyphicon-trash" ></i> 
										
										</button>
									</td>
								</tr>
							
							<?php
						}
					 
					 ?>
					 </tbody>
						</table>
					</div>
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
	<div class="container" >
		<div class="row">
			<div class="col-md-4">
				<a href="#"><button type="button" class="btn btn-danger">Mua tiếp</button></a>
				<button type="button" class="btn btn-danger">Cập nhật giỏ hàng</button>
			</div>
		</div>
	</div >
</div>
</div>

	<?php } ?>