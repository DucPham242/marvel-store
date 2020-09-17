<marquee id="noti_top" ><?php 
	foreach ($get_3order as $key => $value) {
		$at_time=time()-strtotime($value['date_order']);
		?>
		Khách hàng: <?php echo $value['name']; ?> đã đặt đơn hàng 
		<?php 
			if($at_time<3600){
				echo floor($at_time/60).' phút trước';
			}else if($at_time>=3600 && $at_time<=86400){
				echo floor($at_time/3600).' giờ trước';
			}else{
				echo floor($at_time/86400).' ngày trước';
			}
		 ?>

		<?php
		?> <a href="index.php?page=home&views=order" class="setSS_order" id_order="<?php echo $value['id_order']; ?>">(Xem chi tiết)</a>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
		<?php
	}
 ?></marquee>



<!-- 

Khách hàng: Hoàng Lâm đã đặt đơn hàng 2 giờ trước <a href="">(Xem chi tiết)</a> -->