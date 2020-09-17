<div class="col-md-2">



	<div class="row">
		<ul class="list-group" id="menu_left" style="">
			<a href="index.php?page=home&views=status" class="active set-text-nav"><li class="list-group-item">Báo cáo, thống kê</li></a>
			<a href="index.php?page=home&views=banner" class="set-text-nav"><li class="list-group-item" >Thêm ảnh banner</li></a>
			<a href="index.php?page=home&views=product" class="set-text-nav"><li class="list-group-item">Quản lý sản phẩm</li></a>
			<a href="index.php?page=home&views=order" class="set-text-nav"><li class="list-group-item">Quản lý đơn hàng</li></a>
			<a href="index.php?page=home&views=customer" class="set-text-nav"><li class="list-group-item">Quản lý khách hàng</li></a>
			<?php 
			if(isset($_SESSION['id_admin']) && $_SESSION['stt_admin']==1){
				?>
				<a href="index.php?page=home&views=admin-member" class="set-text-nav"><li class="list-group-item">Quản lý thành viên</li></a>
				<?php
			}
			 ?>
			 <a href="index.php?page=home&views=voucher" class="set-text-nav"><li class="list-group-item">Voucher + mã giảm giá</li></a>
			 <a href="index.php?page=home&views=news" class="set-text-nav"><li class="list-group-item">Quản lý bài viết</li></a>
			

		</ul>
	</div>
</div>

