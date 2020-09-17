<?php 
	ob_start();
	session_start();
 ?>
<!DOCTYPE html>
<html lang="">
<?php 
	include_once "layout/head.php";
 ?>

<body >
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
			<div class="col-md-10" id="main_content" style="">
				<div class="row" >
					<!-- START Main-Content -->
				<?php 

					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page='home';
					}

					switch ($page) {
						case 'home':
							include_once"controller/admin_c.php";
							$create=new admin_c();
							$create->create_page();
							break;
						
						default:
						header("Location:index.php");
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

  <!-- 	<script type="text/javascript" src="mdbootstrap/js/mdb.min.js"></script> -->
  	<script type="" src="mdbootstrap/js/addons/datatables.min.js"></script>
  	<script type="text/javascript" src="js/MyJava.js"></script>


 

</body>

</html>