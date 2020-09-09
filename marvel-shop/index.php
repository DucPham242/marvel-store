<?php 
	ob_start();
	session_start();
 ?>
<!DOCTYPE html>
<html lang="">
<?php include_once 'layout/header.php' ?>
<body>
	<!-- Nhúng FB SDK -->
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=638712913439562&autoLogAppEvents=1" nonce="usB2CBM1"></script>
	<!-- END FB SDK -->

	<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root" ></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
            <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="109805184142141"
  theme_color="#0084ff"
  logged_in_greeting="Chào bạn! Marvel Store có thể hỗ trợ điều gì cho bạn ?"
  logged_out_greeting="Chào bạn! Marvel Store có thể hỗ trợ điều gì cho bạn ?">
      </div>
	
		<!-- START MENU Header -->
		<?php include_once 'layout/nav-header.php' ?>
		<!-- END MENU Header -->
		<!-- START MENU NAV-BAR -->
		<?php include_once 'layout/nav-top.php' ?>
		<!-- END NAV-BAR -->

		<!-- START BODY -->
		<?php 
			// echo "<pre>";
		 // 	print_r($_SESSION['cart']);
		 // 	echo "</pre>";


			if(isset($_GET['page'])){
				$page=$_GET['page'];
			}else{
				$page='home';
			}

			switch ($page) {
				case 'home':
					include_once'controller/product_c.php';
					$product = new Product_c();
					$product->Product();
					break;

				case 'list-product':
					include_once 'controller/product_c.php';
					$listProduct = new Product_c();
					$listProduct->typeProduct();
					break;

				case 'info':
					include_once 'controller/info_c.php';
					$information= new Info_c();
					$information->Manual();					
					break;




				default:
					header('Location:index.php');
					break;
			}











		 ?>













		<!-- END BODY -->

		<!-- START Footer -->
		<?php include_once"layout/footer.php"; ?>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/sweetalert.min.js"></script>
	<script src="js/myjs.js"></script>

</body>
</html>