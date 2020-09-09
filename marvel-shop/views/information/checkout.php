<div class="container">
			<div class="row" >
				<ol class="breadcrumb" >
				<li>Trang chủ</li>
				<li>Giỏ hàng</li>
				<li>Thanh toán</li>
				</ol>
				<div class="col-md-6" style="border-right: solid 2px #E6E6E6; min-height: 700px;">
					<h3>Marvelstore</h3><br>
					<h4 style="color: #338dbc">Thông tin giao hàng</h4>
					<div style="" id="checkout_user">
						<?php 
							if(!isset($_COOKIE['id_user'])&& empty($_COOKIE['id_user'])) {
								
						?>
							<h4>Bạn đã có tài khoản? <a href="info/login">Đăng nhập</a></h4>
						<?php 

							}else{
								foreach ($rs_checkout as $key => $value) {
									

						?>
							<i class="fa fa-user-circle-o fa-3x" style="color: gray;" aria-hidden="true"></i>
							<span id="checkout_user_txt" style=""><?php echo $value['name_user']; ?> (<?php echo $value['email'];  ?>)<br>
							<a href="info/logout1">Đăng xuất</a></span>
						<?php 
							}
							}	
						?>
					</div><br>
					<form action="" method="POST"> 

					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								 <span class="glyphicon glyphicon-user"></span>
							</span>

							<input type="text" name="name" class="form-control" value="<?php if(isset($rs_checkout)){ echo $value['name_user'];} ?>" placeholder="Họ và tên" id="name_checkout"  <?php if(isset($_COOKIE['id_user'])){echo "readonly";} ?>>

						</div>
					</div>
					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								 <span class="glyphicon glyphicon-envelope"></span>
							</span>

							<input type="text" name="email" class="form-control" value="<?php if(isset($rs_checkout)){echo $value['email'];}?>" placeholder="Email" <?php if(isset($_COOKIE['id_user'])){echo "readonly";} ?>>

						</div>
					</div>

					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
							</span>

							<input type="text" class="form-control" name="phone" value="<?php if(isset($rs_checkout)){echo $value['phone'];} ?>" placeholder="Số điện thoại" id="phone_checkout" <?php if(isset($_COOKIE['id_user'])){echo "readonly";} ?>>

						</div>
					</div>
					<div class="form-group">
						<div class="input-group">

							<span class="input-group-addon">
								<span class="glyphicon glyphicon-home"></span>
							</span>

							<input type="text" class="form-control" name="address" value="<?php if(isset($rs_checkout)){echo $value['address'];} ?>" placeholder="Địa chỉ nhận hàng" <?php if(isset($_COOKIE['id_user'])){echo "readonly";} ?>>

						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-question-sign"></span>
							</span>
							<textarea name="mess" id="input" class="form-control" rows="3" style="resize: none" required="required" placeholder="Để lại lời nhắn cho chúng tôi...."></textarea>
						</div>
					</div>
					<div class="radio">
						<label id="payment_ship">
							<input type="radio" id="ship" name="payment"  value="1" checked="checked">
							Thanh toán khi giao hàng (COD)
						</label>
					</div>
					<div class="radio">
						<label id="payment_bank">
							<input type="radio" id="bank" name="payment"  value="2">
								Chuyển khoản qua ngân hàng
						</label>
						<div id="box_bank">
						<div class="hide_or_show" id="bank_info">Chuyển khoản qua tài khoản VP Bank <br>
							STK : 188421652 <br>
							Ngân hàng : VP Bank <br>
							Chi nhánh : sở giao dịch <br>
							Chủ tài khoản : Hoang Van Lam <br>
							Nội dung chuyển khoản:<span id="bank_content"><?php if(isset($rs_checkout)){ echo " Họ tên: ".$value['name_user']." .Số điện thoại: ".$value['phone'];} ?></span>
						</div>
						</div>
					</div>
					<div  class="submit-user">
						 <input type="submit" name="submit" value="Hoàn tất đơn hàng" class="form-control">
					</div>
					

				</form><br>
				<a href="cart"> Trở về giỏ hàng</a>

				</div>
				

				<div class="col-md-6" style=" min-height: 700px;">
					<?php 
				// echo '<pre>';
				// print_r($_SESSION['cart']);
				foreach ($_SESSION['cart'] as $key => $cart) {
					
				 ?>
					<div class="checkout_cart_box" style="height: 150px;">
						<img src="<?php echo $cart['img'] ?>" alt="" width="80px;">
						<span class="checkout_product_qty"><?php echo $cart['qty']; ?></span>
						<span class="checkout_product_name" ><?php echo $cart['name_product']; ?></span>
						<span class="checkout_product_price" ><?php 
						if($cart['discount']>0){
							echo number_format($cart['discount_price']) . ' vnđ';
						}else{
							echo number_format($cart['price']) . ' vnđ';
						}?></span>
						<hr>
					</div>
					<?php 
						}
					?>		
				<div>

					<form action="" method="POST" class="form-inline" role="form">
					
						<div class="form-group">
							<label class="sr-only" for="">label</label>
							<input type="text" class="form-control" id="code_voucher" placeholder="Nhập mã giảm giá">
						</div>
					
						
					
						<button type="submit" id="submit_voucher" class="btn btn-default" style="background: #DFDDDD">Sử dụng</button>
					</form>

					<span id="noti_voucher"></span>
				</div>


					<hr>
					<div class="row" id="price_table_box">
					<div id="content_price_table">
					<table class="table table-hover" id="">
						<tbody>
							<tr>
								<td>Tạm tính:</td>
								<td><?php if(isset($_SESSION['total'])){echo number_format($_SESSION['total']).' đ';} ?></td>
							</tr>
							<tr>
								<td>Phí vận chuyển:</td>
								<td><?php echo number_format($_SESSION['ship_price']).' đ'; ?></td>
							</tr>
							<tr>
								<td>Mã giảm giá</td>
								
								<td><?php 
									echo "-".$_SESSION['discount_voucher']."%";
								 ?></td>
							</tr>
						</tbody>
					</table>
					<br>
					<h4 style="margin-left: 20px">Tổng cộng: <span style="color: red;font-weight: bold;font-size:25px;"><?php 
						$_SESSION['TOTAL_ORDER']=$_SESSION['total']-(($_SESSION['total']*$_SESSION['discount_voucher'])/100)+$_SESSION['ship_price'];
						echo number_format($_SESSION['TOTAL_ORDER'])." VNĐ";
					 ?></span></h4>
					</div>
					</div>

				</div>

					</div>


				</div>
			</div>
		</div>
