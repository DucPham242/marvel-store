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
									<th style="width: 200px;">Sản phẩm </th>
									<th>Đơn giá</th>
									<th>Số lượng</th>
									<th>Thành tiền</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
						 
						<?php 
							

								foreach ($_SESSION['cart'] as $key => $cart) {
									
						 ?>
							
								<tr>
									<td><img src="images/product/<?php echo $cart['img']; ?>" alt="Ảnh sản phẩm" width="60px"></td>
									<td style="font-weight: bold;"><?php echo $cart['name_product']; ?></td>
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
									
									
										<td>
											<input type="number" value="<?php echo $cart['qty'] ?>" class="form-control" min="1" max="10" id="">
										</td>
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
											<button style="" value="<?php echo $cart['id_product']; ?>" class="alert-del btn_remove_incart" >
											<i width="30px"class="glyphicon glyphicon-trash"  ></i> 
										
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
					<h3 >Tổng tiền: <?php echo number_format($_SESSION['total']).' đ'; ?></h3>
					<a href="index.php?page=home&method=checkout"><button type="button" class="btn btn-danger">Thanh Toán</button></a>
				</div>
			</div>
		
			<!-- end -->
		</div>
	</div>
	<div class="container" >
		<div class="row">
			<div class="col-md-4">
				<a href="index.php"><button type="button" class="btn btn-danger">Mua tiếp</button></a>
			</div>
		</div>
	</div >
</div>
</div>

	<?php } ?>