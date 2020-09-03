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
			<?php 
		if(isset($_SESSION['noti_review']) && $_SESSION['noti_review'] == 1){
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Đánh giá sản phẩm thành công!</strong>
			</div>
			<?php
		} else if(isset($_SESSION['noti_review']) && $_SESSION['noti_review'] == 2){
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Có sự cố trong quá trình đánh giá</strong>
			</div>
			<?php
		}
		unset($_SESSION['noti_review']);

		 ?>
			<div class="col-md-2" >
				<div class="row">
					<?php 
					foreach ($rs_listimg as $key => $list) {
						?>
						<div class="col-md-6"><img class="list_img_product" src="<?php echo $list['path']; ?>" alt="" width=""></div>
						<?php
					}
					?>
					
					
				</div>
				
				
				
			</div>
			<div class="col-md-5" >
				<img src="<?php echo $value['img']; ?>" alt="" width="450px" id="at_image">
			</div>
			<div class="col-md-5 box_price" style="">
				<h4 style="font-weight: bold"><?php echo $value['name_product']; ?></h4>
				Price:<br>
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
					<span class="price_main_product">
						<?php echo number_format($value['price']).' đ'; ?>
					</span><br>
					<?php
				}


				?>
				


				<button type="button" value="<?php echo $value['id_product']; ?>" class="btn add-alert btn-success btn_buynow"><i class="fa fa-shopping-cart fa-2x cart_icon" aria-hidden="true"></i>Thêm vào giỏ</button><br>
				<a href="index.php?page=home&method=cart" id="link_back_cart" style="">Xem giỏ hàng</a>
				<?php 
				if (!isset($_COOKIE['id_user']) && !isset($_COOKIE['name_user'])) {

					?>
					<div><a href="index.php?page=info&method=login">Đăng nhập</a><span> Để đánh giá sản phẩm!</span></div>
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
						<button type="submit" name="rate" class="btn btn-default">Đánh giá</button>
						</form>
					<?php } ?>
					<div class="fb-like" id="like_share_product" data-href="http://localhost/PHP0320E2/marvel-store/marvel-shop/file-link/product-detail.php" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>

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
					<?php
				}
				?>
				<div class="fb-comments" data-href="http://localhost/PHP0320E2/test_cmtFB/index3.php" data-numposts="5" data-width="" order_by="reverse_time"></div>

			</div>
			<div class="col-md-4" >
				<div class="panel panel-default	">
					<div class="panel-heading"><b>CÁC SẢN PHẨM LIÊN QUAN</b></div>
					<div class="panel-body" style="">
						<?php 
						foreach ($rs_related as $key => $value) {
							?>
							<a href="index.php?page=home&method=product-detail&id=<?php echo $value['id_product']; ?>"><div class="row" style="">
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
			$count = count($_SESSION['seen']);
			if ($count > 5) {
				array_shift($_SESSION['seen']);
				// $count - 1;
			}


			foreach ($_SESSION['seen'] as $key => $value) {
				foreach ($value as $key => $info) {
					$count = count($_SESSION['seen']);		

					?>		

					<div class="col-md-1" style=""><a href="index.php?page=home&method=product-detail&id=<?php echo $info['id_product'] ?>"><img class="list_img_visited" src="<?php echo $info['img']; ?>" alt=""></a></div>

					<?php 
				}
			}
			?>
		</div>



	</div>