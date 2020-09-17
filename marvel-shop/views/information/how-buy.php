<div class="container" >
	<div class="row"  >
		<ol class="breadcrumb" >
			<li>Trang chủ</li>
			<li>Chỉ dẫn mua hàng</li>
		</ol>
	</div>
	<div class="row" >
		<div class="col-md-8 col xs-8" >

			<div class="panel panel-default">
				<div class="panel-heading"><b>TIN TỨC</b></div>
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<div class="thumbnail">
							<?php 
							foreach ($get_news as $key => $value) {
								// echo "<pre>";
								// print_r($get_news);
							}
							?>
							<img src="<?php echo $value['img'] ?>" alt="...">

							<div class="caption" style="text-align: left">
								<a href="index.php?page=info&method=how-buy"><h4 style="color: #000">Hướng dẫn mua hàng và đặt hàng tại MARVEL STORE trên máy tính và laptop</h4></a>

								<p>Cách mua hàng trên Máy tính / lap topBước 1: Chọn sản phẩm bạn thíchBước 2 : Thêm vào giỏ hàngBước 3 : Chốt số lượng và danh sách hàng đã đặtBước 4 : Nhấn thanh toánBước 5 : Điền...</p>

								<p style="text-align: right;"><a href="index.php?page=info&method=how-buy" class="btn btn-primary" role="button">Xem tiếp >></a></p>

							</div>

						</div>
					</div>
				</div>
					
			</div>
			<div class="fb-comments" data-href="http://localhost/PHP0320E2/test_cmtFB/index3.php" data-numposts="5" data-width="" order_by="reverse_time"></div>

		</div>
		<div class="col-md-4" >
			<div class="panel panel-default	">
				<div class="panel-heading"><b>BÀI VIẾT MỚI NHẤT</b></div>
				<div class="panel-body" style="">
					<a href="index.php?page=info&method=how-buy"><div class="row" style="">
						<div class="col-md-4" style="">
							<div class="row">
								<img class="related_img" src="<?php echo $value['img']; ?>" alt="">
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
							<div class="col-md-4 col-xs-4" style="">
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
							<div class="col-md-4 col-xs-4" style="">
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
							<div class="col-md-4 col-xs-4" style="">
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