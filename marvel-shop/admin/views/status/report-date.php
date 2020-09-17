<div class="col-md-6 col-sm-6" >
	<form action="index.php?page=home&views=status&action=report-date" method="POST" role="form">
                <legend>Thống kê doanh thu theo ngày tháng</legend>
            
                <div class="form-group">
                    <label for="">Ngày bắt đầu</label>
                    <input type="date" name="start" class="form-control" required="" value="<?php if(isset($_SESSION['start_reportdate'])){echo $_SESSION['start_reportdate'];} ?>">
                    <span>
                        <label for="">Ngày kết thúc</label>
                        <input type="date" name="end" class="form-control" required="" value="<?php if(isset($_SESSION['end_reportdate'])){echo $_SESSION['end_reportdate'];} ?>">
                    </span>
                </div>
      
                <button type="submit" name="submit_report_date" class="btn btn-primary">Lọc</button>
            </form>
</div>
<div class="col-md-12 col-sm-12"><br>
	<div class="col-md-6 col-sm-12" style="color: red;"><?php echo 'Có '.$number.' kết quả được tìm thấy'; ?></div>
	<div class="col-md-6 col-sm-12">
		
	<select name="city" id="sort_report_date" class="form-control">
		<option value="">--Sắp xếp theo--</option>
		<option value="date_ASC" <?php if(isset($_SESSION['sort_date']) && $_SESSION['sort_date']=='date_ASC'){echo 'selected';} ?> >Cũ nhất</option>
		<option value="date_DESC" <?php if(isset($_SESSION['sort_date']) && $_SESSION['sort_date']=='date_DESC'){echo 'selected';} ?> >Mới nhất</option>
		<option value="revenua_DESC" <?php if(isset($_SESSION['sort_date']) && $_SESSION['sort_date']=='revenua_DESC'){echo 'selected';} ?> >Doanh thu cao nhất</option><option value="revenua_ASC"  <?php if(isset($_SESSION['sort_date']) && $_SESSION['sort_date']=='revenua_ASC'){echo 'selected';} ?> >Doanh thu thấp nhất</option>
		<option value="quantity_DESC" <?php if(isset($_SESSION['sort_date']) && $_SESSION['sort_date']=='quantity_DESC'){echo 'selected';} ?> >Chốt đơn nhiều nhất</option>
		<option value="quantity_ASC" <?php if(isset($_SESSION['sort_date']) && $_SESSION['sort_date']=='quantity_ASC'){echo 'selected';} ?> >Chốt đơn ít nhất</option>
	</select>
	</div><br><br><br>
	<div id="report_date_box">
	<table class="table table-hover" id="table_report_date">
		<thead>
			<tr>
				<th>Ngày</th>
				<th>Chốt đơn</th>
				<th>Doanh thu</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($rs_all as $key => $all) {
				?>
				<td>Tổng:</td>
				<td style="color: red;"><?php echo $all['sodonchot']; ?></td>
				<td style="color: red;"><?php echo number_format($all['doanhthu']).' đ'; ?></td>
				<?php
			}
			foreach ($rs_detail_limit as $key => $detail) {
				?>
				<tr>
				<td><?php echo date("Y-m-d",strtotime($detail['order_done'])); ?></td>
				<td><?php echo $detail['sodonchot']; ?></td>
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
					<li><a href="index.php?page=home&views=<?php echo $views; ?>&action=report-date&pages=<?php echo $back; ?>">Back</a></li>
					<?php 
				}	
				?>
				<?php
				for($i = 1; $i <= $pagination; $i++){
					if ($i > $current - 3 && $i < $current + 3) {
					?>
					<li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="index.php?page=home&views=<?php echo $views; ?>&action=report-date&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php 
				}
			}
				?>
				<?php 
				if (isset($_GET['pages']) && $_GET['pages'] < $pagination) {
					$next = $_GET['pages'] + 1;	
					?>
					<li><a href="index.php?page=home&views=<?php echo $views; ?>&action=report-date&pages=<?php echo $next; ?>">Next</a></li>
					<?php 
				}	
				?>
			</ul>

		</div>
		<!-- END Phân trang -->
</div>