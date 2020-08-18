<div class="container">
		<div class="row"  >
			<ol class="breadcrumb" >
				<li>Trang chủ</li>
				<li>Tất cả sản phẩm</li>
				
			</ol>
		</div>
		<div class="row" >
			<!-- left -->
			<div class="col-md-3" style="background-color:#F5F8F7; color: #F91919;margin-top: 20px">

				<ul class="nav test-demo">
					<li><h4>Danh mục nhóm</h4></li>
					<hr>
					<li class="nav-item">
						<a class="nav-link" href="../index.html">Trang chủ</a>
					</li>

					<li class="nav-item">
						<a href="javascript:;" class="hidden-drop" data-toggle="collapse" data-target="#demo"> Marvel <i class="fa fa-fw fa-caret-down"></i></a>
						<ul  class="collapse " id="demo">
							<a href="index.php?page=list-product&method=modeltoyMV">
								<li>
									Mô hình
								</li>
							</a>
							<a href="index.php?page=list-product&method=technology">
								<li>
									Đồ chơi công nghệ
								</li>
							</a>
							<a href="index.php?page=list-product&method=phukien-mv">
								<li>
									Phụ kiện
								</li>
							</a>

						</ul>
					</li>
					<li class="nav-item">
						<a href="javascript:;" class="hidden-drop" data-toggle="collapse" data-target="#demo2"> DC <i class="fa fa-fw fa-caret-down"></i></a>
						<ul  class="collapse " id="demo2">
							<a href="index.php?page=list-product&method=modeltoyDC">
								<li>
									Mô hình
								</li>
							</a>
							<a href="#">
								<li>
									Đồ chơi công nghệ
								</li>
							</a>
							<a href="#">
								<li>
									Phụ kiện
								</li>
							</a>
						</ul>
					</li>
					<li class="nav-item">
						<a href="javascript:;" class="hidden-drop" data-toggle="collapse" data-target="#demo3"> Transformer <i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="demo3" class="collapse">
							<a href="index.php?page=list-product&method=mohinh-mv">
								<li>
									Mô hình
								</li>
							</a>
							
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Hot sale</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Chỉ dẫn mua hàng</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Liên hệ</a>
					</li>
				</ul>
			</div>
			<!-- end left -->
			<!-- right -->
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12 col-sm-12" style="margin-top: 20px">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">

								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav">
										<li><a href="">Marvel</a></li>
									</ul>
									<ul class="nav navbar-nav navbar-right">
										<li style="margin-top: 10px">
											<div class="btn-group">

													<!-- <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">

														Sắp xếp theo <span class="caret"></span>

													</button>
												-->
													<!-- <ul class="dropdown-menu">

														<li>Từ A-Z</li>
														<li>Từ 0-9</li>

													</ul> -->
													<select name="city" id="">
														<option value="">--Sắp xếp theo--</option>

														<option value="">Tên: A-Z</option><option value="">Tên: Z-A</option>
														<option value="">Giá tăng dần</option>
														<option value="">Giá giảm dần</option>

													</select>
													

												</div>
											</li>
										</ul>
									</div><!-- /.navbar-collapse -->
								</div>
							</nav>
						</div>
					</div>
					<div class="row">
						<?php 
			// 			echo "<pre>";
			// print_r($rs);
			// echo "</pre>";
						foreach ($rs as $key => $value) {
							?>
							<div class="col-md-4 col-xs-6 product_box" style="margin-top: 20px;">
						<div class="thumbnail">
							<div class="set">
								<div href="#" style=""><img style="" src="images/product/<?php echo $value['img']; ?>" width="100%" alt="...">
									<button class="btn btn-danger shower"  data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $value['id_product']; ?>">Xem chi tiết</button>
								</div>

							</div>

							<div class="modal fade bs-example-modal-lg<?php echo $value['id_product'];  ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg ">
								<div class="modal-content" style="padding: 40px;">
									<div class="row">
										<div class="col-md-8" >
											<div class="detail_modal"><img id="at_img" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/2.jpg" alt="" width="300px"></div>
											<div class="row" >
												<div class="col-md-2" ><img class="list_img_detail" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/2.jpg" alt=""></div>
												<div class="col-md-2"><img class="list_img_detail" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/3.jpg" alt=""></div>
												<div class="col-md-2"><img class="list_img_detail" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/4.jpg" alt=""></div>
												<div class="col-md-2"><img class="list_img_detail" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/5.jpg" alt=""></div>
												<div class="col-md-2"><img class="list_img_detail" src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/6.jpg" alt=""></div>


											</div>
										</div>
										<div class="col-md-4">
											<div style="text-align: left">
												<h3>Đồng hồ Citizen</h3>
												<h4>Mô tả sản phẩm:</h4>
												<p style="text-decoration: line-through;color: gray">12,000,000 VNĐ</p>
												<p style="color: #E92020">Giá sản phẩm: 10,000,000 VNĐ</p>

												<button class="button add-cart" type="button">Add To Cart</button>
											</div>

										</div>
									</div>
								</div>
								
							</div>
						</div>

							<div class="caption" style="">

							<a href="file-link/product-detail.php" style="color: #333333;"><h5><?php echo $value['name_product']; ?></h5></a>
							<hr>
							<?php 
								if ($value['discount'] <= 0) {
								
								
							 ?>
								<p class="caption_price_left"><?php echo number_format($value['price']).' đ'; ?></p>
							 <?php 
							}else{

							  ?>
								<span class="caption_price_left"><?php echo number_format($value['discount_price']).' đ'; ?></span><span class="caption_price_right"><?php echo number_format($value['price']).' đ'; ?></span>
							<?php } ?>
						</div>
						</div>
					</div>
						<?php
						}
						 ?>
						
					</div>
					<div class="row">
						<div class="col-md-12 col-md-push-2">
							<ul class="pagination">
								<li><a href="#">1</a></li>
								<li class="active"><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
							</ul>

						</div>
					</div>
				</div>
				<!-- end right -->
			</div>
		</div>
