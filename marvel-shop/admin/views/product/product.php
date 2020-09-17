
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

<!-- <a href="" id="test"> HHHH</a> -->
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
				<form action="" onsubmit="return Validate_addPro();" method="POST" role="form" enctype="multipart/form-data">
					<legend>Điền thông tin sản phẩm</legend>

					<div class="form-group">
						<label for="">Tên sản phẩm</label><span id="spanname" class="spanerror"></span>
						<input type="text" id="name_product" name="name_product" class="form-control"  placeholder="" onblur="Blurname_product()" value="<?php if(isset($name_product)){echo $name_product;} ?>">
					</div>
					<div class="form-group">
						<label for="">Hãng</label>
						<select name="brand"  class="form-control" value="<?php if(isset($id_brand)){echo $id_brand;} ?>">
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
						<select name="type"  class="form-control" value="<?php if(isset($id_type)){echo $id_type;} ?>">
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
						<label for="">Giá (Số liền, không dấu. VD:1000000)</label><span id="spanprice" class="spanerror"></span>
						<input type="number" class="form-control" name="price"  placeholder="100000" id="price_product" onblur="Blurprice()" value="<?php if(isset($price)){echo $price;} ?>">
					</div>
					<div class="form-group">
						<label for="">Ảnh đại diện</label><span id="spanimg" class="spanerror"></span>
						<input type="file"  name="img" class="form-control"  placeholder="" onchange="validate_file()" id="input_avt" required="" accept=".webp,.jpg,.jpeg,.png" >
						<img src="images/product/new_product.jpg" id="avatar" alt="" width="100px">
					</div>
					<div class="form-group">
						<label for="">List ảnh</label><span id="spanlistimg" class="spanerror"></span>
						<input type="file" multiple="" name="list_img[]" class="form-control"  placeholder="" id="list_img" onchange="validate_files()" required="" accept=".webp,.jpg,.jpeg,.png" >
					</div>
					<div class="form-group"></span>
						<label for="">% Giảm giá</label><span id="spandiscount" class="spanerror"></span>
						<input type="number" name="discount"  class="form-control" onblur="Blurdiscount()" id="discount" value="<?php if(isset($discount)){echo $discount;} ?>">
						
					</div>
					<div class="form-group">
						<label for="">Số lượng</label><span id="spanquantity" class="spanerror"></span>
						<input type="number"  name="quantity" class="form-control"  placeholder="" onblur="Blurquantity()" id="quantity" value="<?php if(isset($quantity)){echo $quantity;} ?>">
					</div>
					<div class="form-group">
						<label for="">Mô tả sản phẩm</label>
						<textarea name="description"  cols="30" rows="10" class="ckeditor form-control"><?php if(isset($description)){echo $description;} ?></textarea>
					</div>

					

					<button type="submit" id="submit_addPro" name="add_product" class="btn btn-primary">Thêm</button>
				</form>





			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!-- END Modal -->

<!-- MODAL History -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" >
	Xem lịch sử hoạt động
</button>


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog" role="document" style="width: 1000px;">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel" style="color: blue;">Lịch sử hoạt động</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover" style="">
					<tbody>
						
						<?php 
						$stt_noti=0;
						foreach ($rs_noti as $key => $noti) {
							?>
							<tr>
								<td style="text-align: left;line-height: 40px; "><?php echo $stt_noti +=1; ?></td>
								<td style="text-align: left;color:gray;line-height: 40px; "><?php echo $noti['content_noti']; ?></td>
							</tr>
							<?php
						}
						?>
						
					</tbody>
				</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>

<!-- END MODAL History -->
<?php if(isset($_SESSION['noti_addPro'])&&$_SESSION['noti_addPro']==1){
	?>
	<div class="alert alert-success" style="display: inline;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thêm thành công!</strong> 
	</div>
	<?php
	
} else if(isset($_SESSION['noti_addPro'])&&$_SESSION['noti_addPro']==2){
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại ! Có lỗi trong quá trình thêm</strong>
	</div>
	<?php

}
unset($_SESSION['noti_addPro']);
?>

<?php 
	// echo "<pre>";
	// print_r($rs);
	// echo "</pre>";
?>

<!-- Product View Table -->
<h4 class="center_text" >Danh Sách Sản Phẩm </h4>
<div id="tbl_pro_boxout">
	<div id="tbl_pro_boxin">
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
						<th>ID</th>
						<th>Image</th>
						<th>Tên sản phẩm</th>
						<th>Giá</th>
						<th>% giảm giá</th>
						<th>Số lượng</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$stt=$row*($pages-1);
					foreach ($rs as $key => $value) {

						?>
						<tr>
							<td style="width: 30px;"><?php echo $stt+=1; ?></td>
							<td><?php echo $value['id_product']; ?></td>
							<td style="width: 30px;"><img src="../<?php echo $value['img']; ?>" alt="" style="width: 100%;" ></td>
							<td><?php echo $value['name_product']; ?></td>
							<td><?php
							if($value['discount']>0){
								echo number_format($value['discount_price']).' đ';
							}else{
								echo number_format($value['price']).' đ';
							}
							?></td>
							<td><?php echo $value['discount']."%"; ?></td>
							<td><?php echo $value['quantity']; ?></td>
							<td>
								<a href="index.php?page=home&views=edit-product&id=<?php echo $value['id_product']; ?>"><button type="button" class="btn_edit_product btn btn-primary" value="<?php echo $value['id_product']; ?>"  >Sửa</button></a>
								<?php 
								if($_SESSION['stt_admin']==1){
								 ?>
								 <button type="button" value="<?php echo $value['id_product']; ?>" class="btn_del_product btn btn-danger">Xóa</button>
								 <?php
								}
								?>
							</td>
						</tr>
						<?php
					}
					?>

				</tbody>
			</table>
				</div>
</div>

			<?php 
		}
		?>
		<!-- END Product View Table -->
		<!-- 	Phân trang -->
		<div class="col-md-6 col-md-push-3">
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
				for($i = 1; $i <= $pagination; $i++){
					if ($i > $current - 3 && $i < $current + 3) {
					?>
					<li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php 
				}
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


<!-- --Noti-- -->
<div class="col-md-10 col-md-push-1" style="margin-top: 150px;">
	<table class="table table-hover">
		<legend style="color: red;">Lịch sử hoạt động:</legend>
		<tbody id="body_noti">
			<div from="0" class="div_from">
			<?php
			$stt=0;
			foreach ( $rs_noti as $key => $noti) {
				$stt+=1;
				?>
				<tr>
				<td class="td_noti"><?php echo $stt.'. '.$noti['content_noti']; ?></td>
				</tr>

				<?php
			}if(count($rs_noti_next)>=1){
				?>
			<td class="more_product"><a href="">Xem thêm</a></td>
				<?php
			}
			?>
			</div>
		</tbody>

	</table>	
</div>
<!-- END noti -->



