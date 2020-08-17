<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="">
	<title>Marvel Shop</title>
	<link rel="shortcut icon" href="images/icon-marvel.png">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/myCSS.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />	
	<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.ttf" />

</head>

<body>
	<div class="wrapper" >
	<div class="container" >
		<!-- START MENU Header -->
		<div class="row" style="padding: 20px;position: relative;min-height: 80px;">
			<!-- <div class="col-md-4" >
				<a href="tel:0357545556"><h4>Liên hệ: 0357545556</h4></a>
			</div> -->
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
			<div class="col-md-3 col-md-push-2 col-xs-4" style="padding-top: 5px">
				<span style="padding-right: 10px"><a href="file-link/user-login.html"><i class="fa fa-user-circle-o fa-2x icon-header" aria-hidden="true"></i>
					<span class="show-cart">
						<a href="file-link/cart.html" id="show-cart">
							<i class="fa fa-cart-arrow-down fa-2x icon-header" id="icon-show" aria-hidden="true" ></i>

						<div class="cart_hover-frame">
							<ul>
								<li>
								<table class="table"  style="background-color: #fff; border-radius: 15px;border: 0px solid #FD4040;">
									<tbody>
										<tr>
											<td><img src="images/ck.jpg" alt="" width="50px"></td>
											<td> <p class="name">Mô hình</p>
                                          <p>Type: <span class="light-red">Mô hình</span><br>Số lượng: <span class="light-red">01</span></p></td>
											<td><p class="price">$30.00</p>
                                          <a href="#" class="remove"><i style="color: red" class="fa fa-trash-o fa-1x" aria-hidden="true"></i></a></td>

										</tr>
										<tr>
											<td><img src="images/ck.jpg" alt="" width="50px"></td>
											<td> <p class="name">Mô hình</p>
                                          <p>Type: <span class="light-red">Mô hình</span><br>Số lượng: <span class="light-red">01</span></p></td>
											<td><p class="price">$30.00</p>
                                          <a href="#" class="remove"><i style="color: red" class="fa fa-trash-o fa-1x" aria-hidden="true"></i></a></td>

										</tr>
										<tr>
											<td><img src="images/ck.jpg" alt="" width="50px"></td>
											<td> <p class="name">Mô hình</p>
                                          <p>Type: <span class="light-red">Mô hình</span><br>Số lượng: <span class="light-red">01</span></p></td>
											<td><p class="price">$30.00</p>
                                          <a href="#" class="remove"><i style="color: red" class="fa fa-trash-o fa-1x" aria-hidden="true"></i></a></td>
											
										</tr>
									</tbody>
								</table>

							
	
							<li style="list-style: none">
								<span class="total">Total: <strong>$60.00</strong></span><button class="checkout" onClick="location.href='checkout.html'">CheckOut</button>
							</li>

						</ul>
					</div>
						</a>
					</span>			
					<span id="cart_nums">4</span>
						
				</div>
			</div>	
		</div>
		<!-- END MENU Header -->
		<!-- START MENU NAV-BAR -->
	<div class="container-fluid" style="background: black;">
		<div class="row">
			<div class="container">
				<nav class="navbar" id="nav-bar">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse navbar-ex2-collapse">
					<ul class="nav navbar-nav" id="menu_nav">
						<li class=" nav-item" >
							<a class="nav-link" href="#">TRANG CHỦ</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">MARVEL <b class="caret"></b></a>
							<ul class="dropdown-menu" id="check1">
								<li><a href="#">Mô hình</a></li>
								<li><a href="#">Mũ</a></li>
								<li><a href="#">Phụ kiện</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">DC <b class="caret"></b></a>
							<ul class="dropdown-menu" id="check2">
								<li><a href="#">Mô hình</a></li>
								<li><a href="#">Mũ</a></li>
								<li><a href="#">Phụ kiện</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">TRANSFORMER<b class="caret"></b></a>
							<ul class="dropdown-menu check" id="check3">
								<li><a href="#">Mô hình</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">HOT SALE</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">CHỈ DẪN MUA HÀNG</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="file-link/contract.html">LIÊN HỆ</a>
						</li>
					</ul>
				</div>
				</nav>
			</div>
		</div>
	</div>


	<!-- END NAV-BAR -->
	<!-- START banner -->
	<div class="container-fluid">
		<div class="row" >
			<div id="carousel-id" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-id" data-slide-to="0" class=""></li>
					<li data-target="#carousel-id" data-slide-to="1" class=""></li>
					<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img alt="First slide" src="images/banner/banner.webp" style="width: 100%;">
					</div>
					<div class="item">
						<img alt="First slide" src="images/banner/banner.webp" style="width: 100%;">
					</div>
					<div class="item active">
						<img alt="First slide" src="images/banner/banner.webp" style="width: 100%;">
					</div>
				</div>

				<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>

	<!-- END banner -->
	<!-- START INTRO -->
	<div class="container">
	<!-- <div class="row">
			<div class="status"></div>
		</div> -->

		<div class="row" style="padding-top: 20px">
			<div class="col-md-6 col-xs-12">
			<div class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D" class="fa fa-truck fa-3x" aria-hidden="true"></i>
				<h4>GIAO HÀNG MIỄN PHÍ</h4>
				<p>Tất cả hàng đều được vận chuyển miễn phí khi chuyển khoản trước</p>
			</div>
			<div  class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D;" class="fa fa-refresh fa-3x" aria-hidden="true"></i>
				<h4>ĐỔI TRẢ HÀNG</h4>
				<p>Hàng chuẩn như hình thì nhận không chuẩn trả về không mất phí</p>
			</div>
			</div>
			<div class="col-md-6 col-xs-12">
			<div  class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D" class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
				<h4>GIAO HÀNG NHẬN TIỀN</h4>
				<p>Thanh toán đơn hàng bằng hình thức trực tiếp</p>
			</div>
			<div  class="col-md-6 col-xs-6 intro">
				<i style="color: #5E5D5D" class="fa fa-phone-square fa-3x" aria-hidden="true"></i>
				<h4>ĐẶT HÀNG ONLINE</h4>
				<p>Liên hệ thanh toán: 0357545556</p>
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
						<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
						<div style="height: 1px;background-color: #000;margin-top: 5px"></div>

					</div>
					<div class="col-md-4 col-xs-8">
						<h3 style="color: red">SẢN PHẨM HOT</h3>
						<p>Đây là những sản phẩm được khách hàng yêu thích nhất</p>
					</div>
					<div class="col-md-4 col-xs-2">
						<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
						<div style="height: 1px;background-color: #000;margin-top: 5px"></div>
					</div>
				</div>
			</div>
			<!-- </div> -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="thumbnail">
						<div class="set">
							<a href="#"><img src="images/product/transformer/mo_hinh/BMB LS-01 Nitro Zeus/1.jpg" alt="..."></a>

							<button class="btn btn-danger shower"  data-toggle="modal" data-target=".bs-example-modal-lg1">Xem nhanh</button>

							<div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
						</div>

						<div class="caption">

							<a href="file-link/product-detail.php"><h4>BMB LS-01 Nitro Zeus</h4></a>
						</div>

					</div>
				</div>


			</div>

			<div class="row">
				<div class="col-md-6 col-md-push-5 col-xs-6 col-xs-push-3">
					<a href="file-link/show-all.html"><button type="button" class="btn btn-success btn_viewall">Xem tất cả</button></a>
				</div>
			</div>

			<div class="row">
				<!-- <div class="col-md-12 col-sm-12" > -->
					<div style="text-align: center;">
						<div class="col-md-4 col-xs-2" >
							<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
							<div style="height: 1px;background-color: #000;margin-top: 5px"></div>

						</div>
						<div class="col-md-4 col-xs-8">
							<h3 style="color: red">SẢN PHẨM CỦA MARVEL</h3>
							<p>Đây là những sản phẩm của hãng MARVEL</p>
						</div>
						<div class="col-md-4 col-xs-2">
							<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
							<div style="height: 1px;background-color: #000;margin-top: 5px"></div>
						</div>
					</div>
				</div>
				<div class="row"style="color: red;height: 3px">
					<div class="col-md-12">

					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="thumbnail">
							<div class="set">
								<a href="#"><img src="images/product/marvel/mo_hinh\Mô hình 16 Play Toy Iron Man Mark VI diecast - MK 6/1.jpg" alt="..."></a>

								<button class="btn btn-danger shower"  data-toggle="modal" data-target=".bs-example-modal-lg">Xem chi tiết</button>

								<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content" style="padding: 40px;">
											<div class="row">
												<div class="col-md-4">
													<img src="images/citizen.jpg" alt="" width="300px">
												</div>
												<div class="col-md-8">
													<div style="text-align: left">
														<h3>Đồng hồ Citizen</h3>
														<h4>Mô tả sản phẩm:</h4>
														<p style="color: #E92020">Giá sản phẩm: 10,000,000</p>

														<button class="button add-cart" type="button">Add To Cart</button>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="caption">

								<h4>Đồng hồ kelvin kelin</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-md-push-5 col-xs-6 col-xs-push-3">
						<button type="button" class="btn btn-success btn_viewall">Xem tất cả</button>
					</div>
				</div>
				<div class="row">
					<!-- <div class="col-md-12 col-sm-12" > -->
						<div style="text-align: center;">
							<div class="col-md-4 col-xs-2" >
								<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
								<div style="height: 1px;background-color: #000;margin-top: 5px"></div>

							</div>
							<div class="col-md-4 col-xs-8">
								<h3 style="color: red">SẢN PHẨM CỦA DC</h3>
								<p>Đây là những sản phẩm của hãng DC</p>
							</div>
							<div class="col-md-4 col-xs-2">
								<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
								<div style="height: 1px;background-color: #000;margin-top: 5px"></div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="thumbnail">
								<div class="set">
									<a href="#"><img src="images/product/DC/batman.webp" alt="..."></a>

									<button class="btn btn-danger shower"  data-toggle="modal" data-target=".bs-example-modal-lg">Xem chi tiết</button>

									<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content" style="padding: 40px;">
												<div class="row">
													<div class="col-md-4">
														<img src="images/citizen.jpg" alt="" width="300px">
													</div>
													<div class="col-md-8">
														<div style="text-align: left">
															<h3>Đồng hồ Citizen</h3>
															<h4>Mô tả sản phẩm:</h4>
															<p style="color: #E92020">Giá sản phẩm: 10,000,000</p>

															<button class="button add-cart" type="button">Add To Cart</button>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="caption">

									<h4>Đồng hồ kelvin kelin</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-push-5 col-xs-6 col-xs-push-3">
							<button type="button" class="btn btn-success btn_viewall">Xem tất cả</button>
						</div>
					</div>
					<div class="row">

						<!-- <div class="col-md-12 col-sm-12" > -->
							<div style="text-align: center;">
								<div class="col-md-4 col-xs-2" >
									<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
									<div style="height: 1px;background-color: #000;margin-top: 5px"></div>

								</div>
								<div class="col-md-4 col-xs-8">
									<h3 style="color: red">THƯƠNG HIỆU NỔI TIẾNG</h3>

								</div>
								<div class="col-md-4 col-xs-2">
									<div style="height: 1px;background-color: #000;margin-top: 45px"></div>
									<div style="height: 1px;background-color: #000;margin-top: 5px"></div>
								</div>
							</div>
						</div>

						<div class="row" style="margin: 0px; text-align: center;">
							<div class="col-md-3a col-xs-6">
								<a href="#">

									<img src="images/brand/playarts.webp" alt="..." class="brand_img" >

								</a>
							</div>
							<div class="col-md-3a col-xs-6">
								<a href="#">

									<img src="images/brand/bandai.webp" alt="..." class="brand_img" >

								</a>
							</div>
							<div class="col-md-3a col-xs-6">
								<a href="#">

									<img src="images/brand/toyz.webp" alt="..." class="brand_img" >

								</a>
							</div>
							<div class="col-md-3a col-xs-6">
								<a href="#">

									<img src="images/brand/marvellegends.webp" alt="..." class="brand_img" >

								</a>
							</div>
							<div class="col-md-3a col-xs-6">
								<a href="#">

									<img src="images/brand/lego.webp" alt="..." class="brand_img" >

								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- END BODY -->

				<!-- START Footer -->
				<div class="container-fluid" style="background-color:#010916; ">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<h4  class="tittle_footer">LIÊN HỆ</h4>
								<div style="height: 2px; width: 40px;background-color:#4C83DF"></div>
								<p style="color: #676767;padding-top: 10px">
									77 Vương Thừa Vũ - Thanh Xuân- Hà Nội & Số 7 Nguyễn Hữu Huân - Hoàn Kiếm - HN & 517 Nguyễn Đình Chiểu P2 Q3 HCM & 98 Hoa Lan P2 Q Phú Nhuận HCM
								</p>
								<p style="color: #676767">Phone: <span style="color: #676767">0357545556</span></p>
								<p style="color: #676767">Email: <span style="color: #676767">ngocduc022497@gmail.com</span></p>
							</div>
							<div class="col-md-3">
								<h4  class="tittle_footer">CHÍNH SÁCH HỖ TRỢ</h4>
								<div style="height: 2px; width: 40px;background-color:#4C83DF"></div>
								<a href="#">
									<p style="color: #676767">Tìm kiếm</p>
								</a>
								<a href="#">
									<p style="color: #676767"> Giới thiệu</p>
								</a>
								<a href="#">
									<p style="color: #676767"> Chính sách thanh toán</p>
								</a>
								<a href="#">
									<p style="color: #676767"> Chính sách vận chuyển</p>
								</a>
								<a href="#">
									<p style="color: #676767"> Chính sách đổi trả và nhận tiền</p>
								</a>

							</div>
							<div class="col-md-3">
								<h4  class="tittle_footer">LIÊN KẾT VỚI CHÚNG TÔI</h4>
								<div style="height: 2px; width: 40px;background-color:#4C83DF"></div>
								<h4  style="color: #676767">Hãy liên kết với chúng tôi</h4>
								<div class="icon-font">
									<a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a><span><a href="#"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></span><span><a href="#"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a></span><span><a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></span><span><a href="#"><i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i></a></span>
								</div>
							</div>
							<div class="col-md-3">
								<h4 class="tittle_footer">CẬP NHẬT NHIỀU TIN TỨC HƠN</h4>
								<div style="height: 2px; width: 40px;background-color:#4C83DF"></div>
								<p style="color: #676767">Fanpage của chúng tôi</p>
								<p><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMarvel-Store-109805184142141&tabs=message&width=300&height=150&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=638712913439562" width="300" height="150" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></p>
							</div>
						</div>
					</div>
				</div>
				<!-- END Footer -->
				<!-- back to top -->
					<button class="back-top" title="Lên đầu trang"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
				<!-- end -->
</div>
				<script src="js/jquery-3.4.1.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/myjs.js"></script>
		
</body>
</html>