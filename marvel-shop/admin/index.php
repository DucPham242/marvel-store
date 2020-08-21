<!DOCTYPE html>
<html lang="">
<?php 
	include_once "layout/head.php";
 ?>

<body>
	<!-- START MENU Header -->
	<?php 
		include_once "layout/header.php";
	 ?>
	<!-- END MENU Header -->
	<!-- START Main -->
	<div class="container-fluid" >
		
		<div class="row">
			<?php 
				include_once "layout/nav-left.php";
			 ?>
			<div class="col-md-10" id="main_content">
				<div class="row">
					<!-- START Main-Content -->
				<?php 

					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page='home';
					}

					switch ($page) {
						case 'baocao':
							# code...
							break;
						case 'control':
							# code...
							break;
						case 'product':
							# code...
							break;
							case 'user':
							# code...
							break;
						
						default:
							# code...
							break;
					}


				 ?>
					



					<!-- END Main-Content -->
				</div>
			</div>

		</div>

	</div>
	<!-- END Main -->
	<!-- START Footer -->
	<?php 
		include_once "layout/footer.php";
	 ?>



	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>