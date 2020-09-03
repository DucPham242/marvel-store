<div class="col-md-2">

				<div class="row">
					<ul class="list-group" id="menu_left" >
						<li class="list-group-item"><a href="index.php?page=home&views=status" class="active">Báo cáo, thống kê</a></li>
						<li class="list-group-item" ><a href="index.php?page=home&views=control" class="">Bảng điều khiển</a></li>
						<li class="list-group-item"><a href="index.php?page=home&views=product">Quản lý sản phẩm</a></li>
						<li class="list-group-item"><a href="index.php?page=home&views=order">Quản lý đơn hàng</a></li>
						<li class="list-group-item"><a href="index.php?page=home&views=customer">Quản lý khách hàng</a></li>
						<li class="list-group-item"><a href="index.php?page=home&views=user">Quản lý thành viên</a></li>
						<li class="list-group-item"><a href="">Quản lý hãng sản phẩm</a></li>
						<li class="list-group-item"><a href="">Quản lý loại sản phẩm</a></li>
						<li class="list-group-item"><a href="">Reviews khách hàng</a></li>
					</ul>
				</div>
			</div>

	<div class="row">
		<ul class="list-group" id="menu_left" >
			<li class="list-group-item"><a href="index.php?page=home&views=status" class="active">Báo cáo, thống kê</a></li>
			<li class="list-group-item" ><a href="index.php?page=home&views=control" class="">Bảng điều khiển</a></li>
			<li class="list-group-item"><a href="index.php?page=home&views=product">Quản lý sản phẩm</a></li>
			<li class="list-group-item"><a href="index.php?page=home&views=order">Quản lý đơn hàng</a></li>
			<li class="list-group-item"><a href="index.php?page=home&views=customer">Quản lý khách hàng</a></li>
			<?php 
			if(isset($_SESSION['id_admin']) && $_SESSION['stt_admin']==1){
				?>
				<li class="list-group-item"><a href="index.php?page=home&views=admin-member">Quản lý thành viên</a></li>
				<?php
			}
			 ?>
			 <li class="list-group-item"><a href="index.php?page=home&views=voucher">Voucher + mã giảm giá</a></li>
			

		</ul>
	</div>
</div>
>>>>>>> 0783333d1602c5f2ed2b8716564f8446ae6519ec
