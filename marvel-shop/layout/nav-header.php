<div class="container">

	<div class="row nav-header1" style="padding: 20px;position: relative;min-height: 80px;">
		<div class="col-md-3 col-xs-12 col-sm-12" style="">
			<a href="home"><img id="logo_web" src="images/logo.webp" alt="Ảnh logo"></a>
		</div>
		<div class="col-md-5 col-md-push-1 col-xs-7 input-navhea" style="padding-top: 5px" >
			<form action="search" method="POST">
				<div class="input-group input-group1">
					<input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm" id="input_search_top">
					<span class="input-group-btn">
						<button type="submit" name="submit-search" class="btn btn-default" id="button_search_top">Tìm kiếm</button>
					</span>
				</div><!-- /input-group -->
			</form>
		</div>
		<div id="cartbox">
			<div class="col-md-3 col-md-push-2 col-xs-5 col-xs-push-1" style="padding-top: 5px" id="reload_cartbox" >
				<a href="info/info-user"><i class="fa fa-user-circle-o fa-2x icon-header" aria-hidden="true"></i></a>
				<span class="show-cart">
					<a href="cart" id="show-cart" >
						<i class="fa fa-cart-arrow-down fa-2x icon-header" id="icon-show" aria-hidden="true" ></i>

						<div class="cart_hover-frame"  >
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
														<td><img src="<?php echo $value['img']; ?>" alt="" width="50px"></td>
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

																<button  class="btn_remove cart-hover-del" value="<?php echo $value['id_product']; ?>"><i style="color: red" class="fa fa-trash-o fa-1x" aria-hidden="true"></i></button></td>

															</tr>
															<?php 
														}
													}
													?>

												</tbody>
											</table>


											<?php 
											if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
												?>

												<li style="list-style: none">
													<span class="total">Total: <strong><?php
													echo number_format($_SESSION['total']).' đ'; ?></strong></span><button class="checkout" onClick="location.href='index.php?page=home&method=cart'">CheckOut</button>
												</li>

												<?php
											}else if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
												unset($_SESSION['total']);
											}else{
												unset($_SESSION['total']);
											}

											?>
											

										</ul>
									</div>
								</a>
							</span>
							<?php 
							if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
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