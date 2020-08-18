<?php 
	ob_start();
	session_start();
 ?>
<!DOCTYPE html>
<html lang="">
<?php include_once 'layout/header.php' ?>
<body>

		<!-- START MENU Header -->
		<?php include_once 'layout/nav-header.php' ?>
		<!-- END MENU Header -->
		<!-- START MENU NAV-BAR -->
		<?php include_once 'layout/nav-top.php' ?>
		<!-- END NAV-BAR -->

		<!-- START BODY -->
		<?php 
			if(isset($_GET['page'])){
				$page=$_GET['page'];
			}else{
				$page='home';
			}

			switch ($page) {
				case 'home':
					include_once'controller/product_c.php';
					$product = new Product_c();
					$product->product();
					break;
				case 'list-product':
					include_once 'controller/product_c.php';
					$listProduct = new Product_c();
					$listProduct->typeProduct();
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
	<script src="js/myjs.js"></script>

</body>
</html>