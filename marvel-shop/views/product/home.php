<div class="container-fluid">
	<div class="row" >
		<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-id" data-slide-to="0" class=""></li>
				<li data-target="#carousel-id" data-slide-to="1" class=""></li>
				<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
			</ol>
			<div class="carousel-inner">
				<?php 
				$at=0;
				foreach ($rs_banner as $key => $value) {
					$at+=1;
				?>
				<div class="item <?php if($at==1){ echo 'active';} ?>" >
					<img alt="First slide" src="<?php echo $value['path']; ?>" style="width: 100%;">
				</div>
				<?php
				}
				 ?>
			</div>

			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
</div>

<!-- END banner -->
<!-- START INTRO -->
<div class="container">
	<div class="row" style="padding-top: 20px">
		<div class="col-md-6 col-xs-12">
			<div class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D" class="fa fa-truck fa-3x" aria-hidden="true"></i>
				<h4>GIAO HÀNG MIỄN PHÍ</h4>
				<p class="content_intro">Tất cả hàng đều được vận chuyển miễn phí khi chuyển khoản trước</p>
			</div>
			<div  class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D;" class="fa fa-refresh fa-3x" aria-hidden="true"></i>
				<h4>ĐỔI TRẢ HÀNG</h4>
				<p class="content_intro">Hàng chuẩn như hình thì nhận không chuẩn trả về không mất phí</p>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div  class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D" class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
				<h4>GIAO HÀNG NHẬN TIỀN</h4>
				<p class="content_intro">Thanh toán đơn hàng bằng hình thức trực tiếp</p>
			</div>
			<div  class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D" class="fa fa-phone-square fa-3x" aria-hidden="true"></i>
				<h4>ĐẶT HÀNG ONLINE</h4>
				<p class="content_intro">Liên hệ thanh toán: 0357545556</p>
			</div>
		</div>
	</div>
</div>
<!-- END INTRO -->
<!-- START BODY -->
<div class="container">
	<div class="row">
		<!-- <div class="col-md-12 col-sm-12" > -->
			<div style="text-align: center;">
				<div class="col-md-4 col-xs-2" >
					<div class="hr_top" style=""></div>
					<div class="hr_bot" style=""></div>

				</div>
				<div class="col-md-4 col-xs-8">
					<h3 style="color: red">SẢN PHẨM HOT</h3>
					<p class="title_note">Đây là những sản phẩm được khách hàng đánh giá và yêu thích nhất</p>
				</div>
				<div class="col-md-4 col-xs-2">
					<div class="hr_top"></div>
					<div class="hr_bot"></div>
				</div>
			</div>
		</div>
		<!-- </div> -->
		<div class="row">
			<?php 
			foreach ($rs_hot as $key => $hot) {
				?>
				<div class="col-md-3 col-xs-6 product_box">
					<div class="thumbnail" style="">
						<div class="set">
							<div href="#"><img src="<?php echo $hot['img']; ?>" alt="..." width="100%">
								<button class="btn btn-danger shower" value="<?php echo $hot['id_product']; ?>" data-toggle="modal" data-target=".bs-example-modal-lg">Xem nhanh</button>
							</div>
						</div>

						

						<div class="caption" style="">

							<a href="product-detail/<?php echo $hot['id_product'].'/'.$hot['url_name']; ?>" style="color: #333333;"><h5><?php echo $hot['name_product']; ?></h5></a>
							<hr>
							<?php 
								if ($hot['discount'] <= 0) {
								
								
							 ?>
								<p class="caption_price_left"><?php echo number_format($hot['price']).' đ'; ?></p>
							 <?php 
							}else{

							  ?>
								<span class="caption_price_left"><?php echo number_format($hot['discount_price']).' đ'; ?></span><span class="caption_price_right"><?php echo number_format($hot['price']).' đ'; ?></span>
							<?php } ?>
							
						</div>

					</div>
				</div>
				<?php 
			}
		
			?>


		</div>

		<div class="row">
			<div class="col-md-6 col-md-push-5 col-xs-6">
				<a href="list-product/hot/pages1"><button type="button" class="btn_viewall btn btn-success res-showall-button" style="outline: none;">Xem tất cả</button></a>
			</div>
		</div>

		<div class="row">
			<!-- <div class="col-md-12 col-sm-12" > -->
				<div style="text-align: center;">
					<div class="col-md-4 col-xs-2" >
						<div class="hr_top"></div>
						<div class="hr_bot"></div>

					</div>
					<div class="col-md-4 col-xs-8">
						<h3 style="color: red">SẢN PHẨM CỦA MARVEL</h3>
						<p class="title_note">Đây là những sản phẩm của hãng MARVEL</p>
					</div>
					<div class="col-md-4 col-xs-2">
						<div class="hr_top"></div>
						<div class="hr_bot"></div>
					</div>
				</div>
			</div>
			<div class="row"style="color: red;height: 3px">
				<div class="col-md-12">

				</div>
			</div>
			<div class="row">
				<?php 
				foreach ($rs_mv as $key => $mv) {


					?>
					<div class="col-md-3 col-xs-6 product_box" style="">
						<div class="thumbnail">
							<div class="set">
								<div href="#" style=""><img style="" src="<?php echo $mv['img']; ?>" width="100%" alt="...">
									<button class="btn btn-danger shower"  data-toggle="modal" value="<?php echo $mv['id_product']; ?>" data-target=".bs-example-modal-lg">Xem chi tiết</button>
									
								</div>

							</div>



							<div class="caption" style="">

							<a href="product-detail/<?php echo $mv['id_product'].'/'.$mv['url_name']; ?>" style="color: #333333;"><h5><?php echo $mv['name_product']; ?></h5></a>
							<hr>
							<?php 
								if ($mv['discount'] <= 0) {
								
								
							 ?>
								<p class="caption_price_left"><?php echo number_format($mv['price']).' đ'; ?></p>
							 <?php 
							}else{

							  ?>
								<span class="caption_price_left"><?php echo number_format($mv['discount_price']).' đ'; ?></span><span class="caption_price_right"><?php echo number_format($mv['price']).' đ'; ?></span>
							<?php } ?>
						</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>

			<div class="row">
				<div class="col-md-6 col-md-push-5 col-xs-6 col-xs-push-3">
					<a href="list-product/marvel/pages1"><button type="button" class="btn btn-success btn_viewall" style="outline: none">Xem tất cả</button></a>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-md-12 col-sm-12" > -->
					<div style="text-align: center;">
						<div class="col-md-4 col-xs-2" >
							<div class="hr_top"></div>
							<div class="hr_bot"></div>

						</div>
						<div class="col-md-4 col-xs-8">
							<h3 style="color: red">SẢN PHẨM CỦA DC</h3>
							<p class="title_note">Đây là những sản phẩm của hãng DC</p>
						</div>
						<div class="col-md-4 col-xs-2">
							<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
							<div style="height: 1px;background-color: #000;margin-top: 5px"></div>
						</div>
					</div>
				</div>

				<div class="row">
					<?php 
						foreach ($rs_dc as $key => $dc) {
						
						
					 ?>
					<div class="col-md-3 col-xs-6 product_box">
						<div class="thumbnail" style="">
							<div class="set">
								<div href="#" style=""><img style="" src="<?php echo $dc['img']; ?>" width="100%" alt="...">
									<button class="btn btn-danger shower" value="<?php echo $dc['id_product']; ?>"  data-toggle="modal" data-target=".bs-example-modal-lg">Xem nhanh</button>
								</div>

							</div>

							

							<div class="caption" style="">

							<a href="product-detail/<?php echo $dc['id_product'].'/'.$dc['url_name']; ?>" style="color: #333333;"><h5><?php echo $dc['name_product']; ?></h5></a>
							<hr>
							<?php 
								if ($dc['discount'] <= 0) {
								
								
							 ?>
								<p class="caption_price_left"><?php echo number_format($dc['price']).' đ'; ?></p>
							 <?php 
							}else{

							  ?>
								<span class="caption_price_left"><?php echo number_format($dc['discount_price']).' đ'; ?></span><span class="caption_price_right"><?php echo number_format($dc['price']).' đ'; ?></span>
							<?php } ?>
						</div>
						</div>
					</div>
					<?php 
						}
					 ?>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-push-5 col-xs-6 col-xs-push-3">
						<a href="list-product/dc/pages1"><button type="button" class="btn btn-success btn_viewall" style="outline: none;">Xem tất cả</button></a>
					</div>
				</div>
				<div class="modal fade bs-example-modal-lg modal_content" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					
				</div>
				<div class="row">

					<!-- <div class="col-md-12 col-sm-12" > -->
						<div style="text-align: center;">
							<div class="col-md-4 col-xs-2" >
								<div class="hr_top"></div>
								<div class="hr_bot"></div>

							</div>
							<div class="col-md-4 col-xs-8">
								<h3 style="color: red">THƯƠNG HIỆU NỔI TIẾNG</h3>

							</div>
							<div class="col-md-4 col-xs-2">
								<div class="hr_top"></div>
								<div class="hr_bot"></div>
							</div>
						</div>
					</div>

					<div class="row" style="margin: 0px; text-align: center;">
						<div class="col-md-3a col-xs-4">
							<a href="#">

								<img src="images/brand/playarts.webp" alt="..." class="brand_img" >

							</a>
						</div>
						<div class="col-md-3a col-xs-4">
							<a href="#">

								<img src="images/brand/bandai.webp" alt="..." class="brand_img" >

							</a>
						</div>
						<div class="col-md-3a col-xs-4">
							<a href="#">

								<img src="images/brand/toyz.webp" alt="..." class="brand_img" >

							</a>
						</div>
						<div class="col-md-3a col-xs-4">
							<a href="#">

								<img src="images/brand/marvellegends.webp" alt="..." class="brand_img" >

							</a>
						</div>
						<div class="col-md-3a col-xs-4">
							<a href="#">

								<img src="images/brand/lego.webp" alt="..." class="brand_img" >

							</a>
						</div>
					</div>
				</div>
			</div>