<div class="container" >
	<div class="row"  >
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Chỉ dẫn mua hàng</li>
		</ol>
	</div>
	<div class="row" >
		<div class="col-md-12">
		<div class="col-md-8" >
			<?php foreach ($get_news as $key => $value) {
								
			?>
			<h3 style="color: #2AE497"><?php echo $value['title']; ?></h3>
			<?php 
			echo $value['content'];
			}
			?>
			<div class="fb-comments" data-href="http://localhost/PHP0320E2/test_cmtFB/index3.php" data-numposts="5" data-width="" order_by="reverse_time"></div>
		</div>
		<div class="col-md-4" >
			<div class="panel panel-default	">
				<div class="panel-heading"><b>BÀI VIẾT MỚI NHẤT</b></div>
				<div class="panel-body" style="">
					<a href="index.php?page=info&method=how-buy"><div class="row" style="">
						<div class="col-md-4" style="">
							<div class="row">
								<?php foreach ($get_news as $key => $value) {
									
								} ?>
								<img src="<?php echo $value['img']; ?>" width="110px" alt="">
							</div>
						</div>
						<div class="col-md-8" style="">
							<a href="index.php?page=info&method=how-buy"><h5 >Hướng dẫn mua hàng và đặt hàng tại MARVEL STORE trên máy tính và laptop</h5></a>
							

						</div>
					</div></a>
				</div>
				<div class="panel panel-default	">
					<div class="panel-heading"><b>NHỮNG SẢN PHẨM HOT NHẤT</b></div>
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
</div>
	</div>
</div>