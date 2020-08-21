<div class="container">

	<div class="row" style="padding: 20px;position: relative;min-height: 80px;" >
		<div class="col-md-3 col-xs-12" style="">
			<a href="index.php"><img src="images/logo.webp" alt="Ảnh logo"></a>
		</div>
		<div class="col-md-5 col-md-push-1 col-xs-8" style="padding-top: 5px" >
			<form>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Tìm kiếm</button>
					</span>
				</div><!-- /input-group -->
			</form>
		</div>
		<div id="cartbox">
		<div class="col-md-3 col-md-push-2 col-xs-4" style="padding-top: 5px" id="reload_cartbox" >
			<a href="file-link/user-login.html"><i class="fa fa-user-circle-o fa-2x icon-header" aria-hidden="true"></i></a>
				<span class="show-cart">
					<a href="index.php?page=home&method=cart" id="show-cart" >
						<i class="fa fa-cart-arrow-down fa-2x icon-header" id="icon-show" aria-hidden="true" ></i>

						<div class="cart_hover-frame" style="width: 400px" >
							<ul>
								<li>
									<table class="table"  style="background-color: #fff; border-radius: 15px;border: 0px solid #FD4040;">
										<tbody>
											<?php 
											if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
												?>
												<h4 style="color: red;margin: 20px 20px;">Giỏ hàng của bạn hiện đang trống!</h4>
												<?php
											}else{
												$_SESSION['total']=0;
												$_SESSION['cart_qty']=0;
												foreach ($_SESSION['cart'] as $key => $value) {
													

													?>
													<tr>
														<td><img src="images/product/<?php echo $value['img']; ?>" alt="" width="50px"></td>
														<td> <p class="name" style="color: #085FD6;font-weight: bold;"><?php echo $value['name_product']; ?></p>
															<p>Thể loại: <span class="light-red"><?php echo $value['name_type']; ?></span><br>Số lượng: <span class="light-red"><?php echo $value['qty'];
															$_SESSION['cart_qty']+=$value['qty'];
															?></span></p></td>

															<td>
																<?php if ($value['discount'] <= 0)
																{ 
																	?>
																	<p class="price"><?php echo number_format($price=$value['price']*$value['qty']).' đ'; ?></p>
																	<?php
																	$_SESSION['total']+=$price;
																}else{
																	?>
																	<p class="price"><?php echo number_format($price=$value['discount_price']*$value['qty']).' đ'; ?></p>
																	<?php
																	$_SESSION['total']+=$price;
																}
																?>

																<a href="#" class="remove"><i style="color: red" class="fa fa-trash-o fa-1x" aria-hidden="true"></i></a></td>

															</tr>
															<?php 
														}
													}
													?>

												</tbody>
											</table>


											<?php 
											if(isset($_SESSION['cart'])){
												?>

												<li style="list-style: none">
													<span class="total">Total: <strong><?php
													echo number_format($_SESSION['total']).' đ'; ?></strong></span><button class="checkout" onClick="location.href='checkout.html'">CheckOut</button>
												</li>

												<?php
											}

											?>
											

										</ul>
									</div>
								</a>
							</span>
							<?php 
							if(isset($_SESSION['cart'])){
								?>
								<span id="cart_nums"><?php echo $_SESSION['cart_qty']; ?></span>
								<?php
							}else{
								?>
								<span id="cart_nums">0</span>
								<?php
							}
							?>			
							

						</div>
						</div>
					</div>	
				</div>