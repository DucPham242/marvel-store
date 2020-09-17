<div class="col-md-12 col-sm-12" >
	<form action="index.php?page=home&views=status&action=report-product" method="POST" role="form">
		<legend>Thống kê doanh thu theo sản phẩm</legend>
		<div class="col-md-6 col-sm-6">
			<div class="form-group">
				<label for="">Ngày bắt đầu</label>
				<input type="date" required="" name="start" class="form-control"  value="<?php if(isset($_SESSION['start_date_product'])){echo $_SESSION['start_date_product'];} ?>" >
				<span>
					<label for="">Ngày kết thúc</label>
					<input type="date" required="" name="end" class="form-control" value="<?php if(isset($_SESSION['end_date_product'])){echo $_SESSION['end_date_product'];} ?>">
				</span>
			</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<label for="key_search">Tìm kiếm sản phẩm</label>
			<input type="text" name="key_search" class="form-control" id="key_search" value="<?php if(isset($_SESSION['report_product_name'])){echo str_replace('%', '', $_SESSION['report_product_name']);} ?>" placeholder="Nhập sản phẩm cần tìm kiếm">
		</div>
		<div class="col-md-12 col-sm-12">
			<button type="submit" name="submit_report_date" class="btn btn-primary">Lọc</button>
		</div>

	</form>
</div>
<div class="col-md-12 col-sm-12"><br>
	<div class="col-md-6 col-sm-12" style="color: red;"><?php echo 'Có '.$number.' kết quả được tìm thấy'; ?></div>
	<div class="col-md-6 col-sm-12">
	<select name="city" id="sort_report_product" class="form-control">
		<option value="">--Sắp xếp theo--</option>
		<option value="revenua_DESC" <?php if(isset($_SESSION['sort_product']) && $_SESSION['sort_product']=='revenua_DESC'){echo 'selected';} ?> >Doanh thu cao nhất</option><option value="revenua_ASC"  <?php if(isset($_SESSION['sort_product']) && $_SESSION['sort_product']=='revenua_ASC'){echo 'selected';} ?> >Doanh thu thấp nhất</option>
		<option value="quantity_DESC" <?php if(isset($_SESSION['sort_product']) && $_SESSION['sort_product']=='quantity_DESC'){echo 'selected';} ?> >Đã bán nhiều nhất</option>
		<option value="quantity_ASC" <?php if(isset($_SESSION['sort_product']) && $_SESSION['sort_product']=='quantity_ASC'){echo 'selected';} ?> >Đã bán ít nhất</option>
	</select>
	</div><br><br><br>
	<div id="report_product_box">
	<table class="table table-hover" id="table_report_product">
		<thead>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Tên sản phẩm</th>
				<th>SL đã bán</th>
				<th>Doanh thu</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach ($rs_all as $key => $all) {
				?>
				<tr>
					<td>Tổng:</td>
					<td></td>
					<td></td>
					<td style="color: red;"><?php echo $all['SLdaban']; ?></td>
					<td style="color: red;"><?php echo number_format($all['doanhthu']).' đ'; ?></td>
				</tr>
				<?php
			}
			foreach ($rs_detail_limit as $key => $detail) {
				?>
				<tr>
					<td><?php echo $detail['id_product'];  ?></td>
					<td style="width: 30px"><img src="../<?php echo $detail['img']; ?>" alt="" style="width: 100%;"></td>
					<td><?php echo $detail['name_product']; ?></td>
					<td><?php echo $detail['SLdaban']; ?></td>
					<td><?php echo number_format($detail['doanhthu']).' đ'; ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	</div>
	<!-- 	Phân trang -->
		<div class="col-md-6 col-md-push-3">
			<ul class="pagination">
				<?php 
				if (isset($_GET['pages']) && $_GET['pages'] > 1) {
					$back = $_GET['pages'] - 1;

					?>
					<li><a href="index.php?page=home&views=<?php echo $views; ?>&action=report-product&pages=<?php echo $back; ?>">Back</a></li>
					<?php 
				}	
				?>
				<?php
				for($i = 1; $i <= $pagination; $i++){
					if ($i > $current - 3 && $i < $current + 3) {
					?>
					<li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="index.php?page=home&views=<?php echo $views; ?>&action=report-product&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php 
				}
			}
				?>
				<?php 
				if (isset($_GET['pages']) && $_GET['pages'] < $pagination) {
					$next = $_GET['pages'] + 1;	
					?>
					<li><a href="index.php?page=home&views=<?php echo $views; ?>&action=report-product&pages=<?php echo $next; ?>">Next</a></li>
					<?php 
				}	
				?>
			</ul>

		</div>
		<!-- END Phân trang -->
	</div>