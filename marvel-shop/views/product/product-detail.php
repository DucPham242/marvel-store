<div class="container" >
	<div class="row" id="box_show_product" >
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Danh mục sản phẩm</li>
			<?php 
			foreach ($rs as $key => $value) {
				?>
				<li><?php echo $value['name_brand']; ?></li>
				<li><?php echo $value['name_type']; ?></li>
				<li><?php echo $value['name_product']; ?></li>

			</ol>
			
			<div class="col-md-2 col-xs-12" >
				<div class="row">
					<?php 
					foreach ($rs_listimg as $key => $list) {
						?>
						<div class="col-md-6 box_listimg_detail"><img class="list_img_product" src="<?php echo $list['path']; ?>" alt="" width=""></div>
						<?php
					}
					?>
					
					
				</div>
			</div>
			<div class="col-md-5 col-xs-12" >
				<img src="<?php echo $value['img']; ?>" alt="" width="450px" id="at_image">
			</div>
			<div class="col-md-5 box_price" style="">
				<h4 style="font-weight: bold"><?php echo $value['name_product']; ?></h4>
				<?php if ($count_review <= 0) {	
					?>
					<h5>Sản phẩm này chưa được ai đánh giá!</h5><br>
					<?php
				}else{
					?>
					<h5 style="color: #0825AB;">Sản phẩm này đã được <?php echo $count_review; ?> người đánh giá 5 sao !</h5><br>
					<?php 
				}
				?>
				<h4>Giá sản phẩm:</h4>
				<?php 
				if($value['discount']>0){
					?>
					<span class="price_discount_product">
						<?php echo number_format($value['discount_price']).' đ'; ?>

					</span>
					<span class="price_main_product">
						<?php echo number_format($value['price']).' đ'; ?>
					</span><br>


					<?php
				}else{
					?>
					<span class="price_discount_product">
						<?php echo number_format($value['price']).' đ'; ?>
					</span><br>
					<?php
				}
				?>
				<?php 
				// echo $value['quantity'];
					if ($value['quantity'] <= 0) {
					
				?>
					<h4 style="color: #F86161">Sản phẩm tạm thời đang hết hàng!</h4>
				<?php 
				}else{
				?>
				<button type="button" value="<?php echo $value['id_product']; ?>" class="btn add-alert btn-success btn_buynow"><i class="fa fa-shopping-cart fa-2x cart_icon" aria-hidden="true"></i>Thêm vào giỏ</button><br><br>
				<span style="font-weight: bold;color: gray;font-style: italic;">SL còn: <?php echo $value['quantity']; ?></span>
				<?php 
				}
				?>
				<?php 
				if (!isset($_COOKIE['id_user']) && !isset($_COOKIE['name_user'])) {

					?>
					<div><a href="info/login">Đăng nhập</a><span> Để đánh giá sản phẩm!</span></div>
					<?php 
				}else if(isset($_COOKIE['id_user']) && isset($_COOKIE['name_user'])){
					if ($check_raiting == 1) {
						
						?>
						<h4 style="color: #0825AB;">Bạn đã đánh giá sản phẩm này!</h4>
						<?php 
					}else{
						?>
						<form action="" id="frm_raiting" method="POST" style="">
							<span>Đánh giá sản phẩm:</span>
							<input type="radio" name="star_val" value="1" class="1_star star_val">
							<input type="radio" name="star_val" value="2" class="2_star star_val" >
							<input type="radio" name="star_val" value="3" class="3_star star_val">
							<input type="radio" name="star_val" value="4" class="4_star star_val">
							<input type="radio" name="star_val" value="5" class="5_star star_val" checked="">
							<br>
							<div>
								<img src="images/gold_star.png" alt="" class="star" id="1_star">
								<img src="images/gold_star.png" alt="" class="star" id="2_star">
								<img src="images/gold_star.png" alt="" class="star" id="3_star">
								<img src="images/gold_star.png" alt="" class="star" id="4_star">
								<img src="images/gold_star.png" alt="" class="star" id="5_star">
							</div><br>
							<button type="submit" name="rate" class="btn btn-default">Đánh giá</button><?php 
							if(isset($_SESSION['noti-review']) && $_SESSION['noti-review'] == 1){
								?>
								<span class="alert alert-success " id="alert1">
									<button type="button" data-dismiss="alert" aria-hidden="true"></button>
									<strong>Cảm ơn bạn đã đánh giá sản phẩm !</strong>
								</span>
								<?php
							} else if(isset($_SESSION['noti-review']) && $_SESSION['noti-review'] == 2){
								?>
								<span class="alert alert-danger " id="alert1">
									<button type="button" data-dismiss="alert" aria-hidden="true"></button>
									<strong>Có sự cố trong quá trình đánh giá</strong>
								</span>
								<?php
							}
							unset($_SESSION['noti-review']);

							?>
						</form>

						<?php 
					}
				}
				?>
				<div class="fb-like" id="like_share_product" data-href="http://57579b8a0657.ngrok.io/PHP0320E2/marvel-store/marvel-shop/product-detail/260/3athreezero-optimus-prime-dlx-scale" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>

			</div>
		</div>
		<div class="row" >
			<div class="col-md-8" >

				<div class="panel panel-success">
					<div class="panel-heading"><b>MÔ TẢ SẢN PHẨM</b></div>
					<div class="panel-body">
						<?php 
						echo $value['description'];
						?>
					</div>
				</div>
				<div class="fb-comments" data-href="http://localhost/PHP0320E2/marvel-store/marvel-shop/index.php?page=home&method=product-detail&id=<?php echo $value['id_product']; ?>" data-numposts="5" data-width="" order_by="reverse_time"></div>
				<?php
			}
			?>

		</div>
		<div class="col-md-4" >
			<div class="panel panel-default	">
				<div class="panel-heading"><b>CÁC SẢN PHẨM LIÊN QUAN</b></div>
				<div class="panel-body" style="">
					<?php 
					foreach ($rs_related as $key => $value) {
						?>
						<a href="product-detail/<?php echo $value['id_product'].'/'.$value['url_name']; ?>"><div class="row" style="">
							<div class="col-md-4" style="">
								<div class="row">
									<img class="related_img" src="<?php echo $value['img']; ?>" alt="">
								</div>
							</div>
							<div class="col-md-8" style="">
								<h4><?php echo $value['name_product']; ?></h4><br>
								<?php
								if($value['discount']>0){
									?>
									<span class="price_main_product">
										<?php echo number_format($value['price']).' VNĐ'; ?>
									</span>
									<span class="price_discount_product">
										<?php echo number_format($value['discount_price']).' VNĐ'; ?>
									</span><br>
									<?php
								}else{
									?>
									<span class="price_discount_product">
										<?php echo number_format($value['price']).' VNĐ'; ?>
									</span><br>
									<?php
								}
								?>

							</div>
						</div></a>
						<br>
						<?php
					}
					?>



				</div>
			</div>


		</div>

	</div>
	<div class="row" id="visited_box">
		<div class="col-md-3" style="">Sản phẩm bạn vừa xem:</div>
		<?php  
			// echo '<pre>';
			// print_r($_SESSION['seen']);
			// echo"</pre>";
		// $count = count($_SESSION['seen']);
		// if ($count > 5) {
		// 	array_shift($_SESSION['seen']);
		// }


		foreach ($_SESSION['seen'] as $key => $value) {
				?>		

				<div class="col-md-1" style=""><a href="product-detail/<?php echo $value['id_product'].'/'.$value['url_name']; ?>"><img class="list_img_visited" src="<?php echo $value['img']; ?>" alt=""></a></div>

				<?php 
		}
		?>
	</div>

</div>