
<!-- START Main-Content -->

<!-- Tìm kiếm -->
<form action="index.php?page=home&views=product" method="POST" role="form" >

	<div class="form-group" >
		<input type="text" name="key_product" value="<?php if(isset($_SESSION['key_product'])){ echo str_replace('%', '', $_SESSION['key_product']);} ?>" class="form-control col-md-11" id="" placeholder="Tim kiếm sản phẩm"><button type="submit" name="search_product" class="btn btn-default col-md-1">Tìm kiếm</button><br><br><br>


	</div>
</form>
<!-- END Tìm kiếm -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">
	Thêm mới sản phẩm
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document" style="width: 1000px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
					<legend>Điền thông tin sản phẩm</legend>
				
					<div class="form-group">
						<label for="">Tên sản phẩm</label>
						<input type="text" name="name_product" class="form-control" id="" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Hãng</label>
						<select name="brand" id="" class="form-control">
							<?php 
								foreach ($rs_brand as $key => $brand) {
									?>
										<option value="<?php echo $brand['id_brand']; ?>"><?php echo $brand['name_brand']; ?></option>
									<?php
								}
							 ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Thể loại</label>
						<select name="type" id="" class="form-control">
							<?php 
								foreach ($rs_type as $key => $type) {
									?>
										<option value="<?php echo $type['id_type']; ?>"><?php echo $type['name_type']; ?></option>
									<?php
								}
							 ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Giá (Số liền, không dấu. VD:1000000)</label>
						<input type="text" class="form-control" name="price" id="" placeholder="100000">
					</div>
					<div class="form-group">
						<label for="">List ảnh</label>
						<input type="file" multiple="" name="list_img[]" class="form-control" id="" placeholder="">
					</div>
				<div class="form-group">
						<label for="">% Giảm giá</label>
						<input type="text"  name="discount" class="form-control" id="" placeholder="50">
					</div>
					<div class="form-group">
						<label for="">Số lượng</label>
						<input type="text"  name="quantity" class="form-control" id="" placeholder="100">
					</div>
					<div class="form-group">
						<label for="">Mô tả sản phẩm</label>
						<textarea name="description" id="" cols="30" rows="10" class="ckeditor form-control"></textarea>
					</div>
				
					
				
					<button type="submit" name="add_product" class="btn btn-primary">Thêm</button>
				</form>





			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				<button type="button" class="btn btn-primary">Thêm</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal -->

<?php 
	// echo "<pre>";
	// print_r($rs);
	// echo "</pre>";
 ?>

<!-- Product View Table -->
<h4 class="center_text" >Danh Sách Sản Phẩm </h4>
<p style="color: red;">Có <?php echo $number; ?> kết quả</p>
<?php 
	// echo "<pre>";
	// print_r($rs);
	// echo "</pre>";
if(count($rs)<1){
	echo "<span style='color:red;'>Không có sản phầm nào !</span>";
}else{



	?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>% giảm giá</th>
				<th>Số lượng</th>
				<th>Tình trạng</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$stt=$row*($pages-1);
			foreach ($rs as $key => $value) {

				?>
				<tr>
					<td ><?php echo $stt+=1; ?></td>
					<td><?php echo $value['name_product']; ?></td>
					<td><?php
						if($value['discount']>0){
							echo number_format($value['discount_price']).' đ';
						}else{
							echo number_format($value['price']).' đ';
						}
					 ?></td>
					<td><?php echo $value['discount']; ?></td>
					<td><?php echo $value['quantity']; ?></td>
					<td><?php echo $value['stt']; ?></td>
					<td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-1" data-backdrop="static" data-keyboard="false">Sửa</button>
						<button type="button" class="btn btn-danger">Xóa</button>
					</td>
				</tr>
				<?php
			}
			?>

		</tbody>
	</table>
	<?php 
}
?>
<!-- END Product View Table -->

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document" style="width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal -->
<!-- 	Phân trang -->
<div class="col-md-12 col-md-push-3">
	<ul class="pagination">
		<?php 
		if (isset($_GET['pages']) && $_GET['pages'] > 1) {
			$back = $_GET['pages'] - 1;

			?>
			<li><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $back; ?>">Back</a></li>
			<?php 
		}	
		?>
		<?php
									// echo $pagination;
		for($i = 1; $i <= $pagination; $i++){

			?>
			<li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php 
		}
		?>
		<?php 
		if (isset($_GET['pages']) && $_GET['pages'] < $pagination) {
			$next = $_GET['pages'] + 1;	
			?>
			<li><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $next; ?>">Next</a></li>
			<?php 
		}	
		?>
	</ul>

</div>
						<!-- END Phân trang -->