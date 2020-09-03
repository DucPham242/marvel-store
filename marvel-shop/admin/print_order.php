<?php 
ob_start();
session_start();
 ?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="">
	<title>Chi tiết đơn hàng</title>

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/myCSS.css" />
	<link rel="stylesheet" href="fonts/glyphicons-halflings-regular.ttf" />


</head>

<body style="background: white;">
	<?php 
	include_once"controller/admin_c.php";
	$create=new admin_c();
	$rs_order=$create->getOrder_ID($_SESSION['id_print']);
	$rs_detail=$create->getDetail_Order_Name($_SESSION['id_print']);
	?>
	<div id="order-detail-wrapper">
            <div id="order-detail">
            	<?php 
            	foreach ($rs_order as $key => $order) {
            		?>
            	<h2 id="title_print">Chi tiết đơn hàng</h2>
                <label>Người nhận: </label><span> <?php echo $order['name']; ?></span><br/>
                <label>Điện thoại: </label><span> <?php echo $order['phone']; ?></span><br/>
                <label>Địa chỉ: </label><span> <?php echo $order['address']; ?></span><br/>
                <hr class="hr_print">
                <h4>Danh sách sản phẩm:</h4>
                <ul>
                  <?php 
                  $quantity=0;
                  foreach ($rs_detail as $key => $detail) {
                  	$quantity+=$detail['quantity'];
                  ?>
                        <li>
                            <span class=""><?php echo $detail['name_product']." x".$detail['quantity'];?></span> 
                        </li>
                  <?php
                  }
                   ?> 
                </ul>
                <hr class="hr_print">
                <label>Tổng SL: <?php echo $quantity; ?></label><br>
                <?php 
                if($order['id_payment']==1){
                	?>
                	<label>Phí vận chuyển: <?php echo number_format(35000)." đ"; ?></label><br>
                	<?php
                }
                 ?>
                 <label>Tổng tiền: <?php echo number_format($order['total'])." đ"; ?></label>
            		<?php
            	}
            	 ?>
            </div>
        </div>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>


</body>


</html>