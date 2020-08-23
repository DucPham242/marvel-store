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
		 	  ?>
			<div class="col-md-2" >
				<div class="row">
					<div class="col-md-6"><img class="list_img_product" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/1.jpg" alt="" width=""></div>
					<div class="col-md-6"><img class="list_img_product" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/2.jpg" alt="" width=""></div>

					<div class="col-md-6"><img class="list_img_product" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/3.jpg" alt="" width=""></div>

					<div class="col-md-6"><img class="list_img_product" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/4.jpg" alt="" width=""></div>

					<div class="col-md-6"><img class="list_img_product" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/5.jpg" alt="" width=""></div>
					<div class="col-md-6"><img class="list_img_product" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/6.jpg" alt="" width=""></div>
				</div>
				
				
				
			</div>
			<div class="col-md-5" >
				<img src="images/product/<?php echo $value['img']; ?>" alt="" width="450px" id="at_image">
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
					<span class="price_discount_product">
						<?php echo number_format($value['price']).' đ'; ?>
					</span><br>
					<?php
				}


				?>
				


				<button type="button" value="<?php echo $value['id_product']; ?>" class="btn add-alert btn-success btn_buynow"><i class="fa fa-shopping-cart fa-2x cart_icon" aria-hidden="true"></i>Thêm vào giỏ</button><br>
				<a href="index.php?page=home&method=cart" id="link_back_cart" style="">Xem giỏ hàng</a>

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
					<button type="submit" class="btn btn-default">Đánh giá</button>
				</form>
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
					<a href=""><div class="row" style="">
						<div class="col-md-4" style="">
							<div class="row">
								<img class="related_img" src="images/product/transformer/mo_hinh/Bumblebee Comicave kim loại/1.jpg" alt="">
							</div>
						</div>
						<div class="col-md-8" style="">
							<h4>Bumblebee Comicave 80% kim loại</h4><br>
							<span class="price_main_product">
								600,000 VNĐ
							</span>
							<span class="price_discount_product">
								1,850,000 VNĐ
							</span><br>

						</div>
					</div></a>
					<br>
					<a href=""><div class="row" style="">
						<div class="col-md-4" style="">
							<div class="row">
								<img class="related_img" src="images/product/transformer/mo_hinh/3AThreeZero Optimus Prime DLX Scale/1.jpg" alt="">
							</div>
						</div>
						<div class="col-md-8" style="">
							<h4>Bumblebee Comicave 80% kim loại</h4><br>
							<span class="price_main_product">
								600,000 VNĐ
							</span>
							<span class="price_discount_product">
								1,850,000 VNĐ
							</span><br>

						</div>
					</div></a>
					<br>
					<a href=""><div class="row" style="">
						<div class="col-md-4" style="">
							<div class="row">
								<img class="related_img" src="images/product/transformer/mo_hinh/COMBO LS-14 + LS-15/1.jpg" alt="">
							</div>
						</div>
						<div class="col-md-8" style="">
							<h4>Bumblebee Comicave 80% kim loại</h4><br>
							<span class="price_main_product">
								600,000 VNĐ
							</span>
							<span class="price_discount_product">
								1,850,000 VNĐ
							</span><br>

						</div>
					</div></a>
				</div>
			</div>


		</div>

	</div>
	<div class="row" id="visited_box">
		<div class="col-md-3" style="">Sản phẩm bạn vừa xem:</div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/COMBO LS-14 + LS-15/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/COMBO LS-14 + LS-15/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/COMBO LS-14 + LS-15/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/Bumblebee Comicave kim loại/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/Bumblebee Comicave kim loại/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/Bumblebee Comicave kim loại/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/Bumblebee Comicave kim loại/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/Bumblebee Comicave kim loại/1.jpg" alt=""></a></div>
		<div class="col-md-1" style=""><a href=""><img class="list_img_visited" src="images/product/transformer/mo_hinh/Bumblebee Comicave kim loại/1.jpg" alt=""></a></div>
	</div>



</div>