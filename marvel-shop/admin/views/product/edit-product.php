<div class="col-md-10 col-md-push-1">
	<form action="" method="POST" role="form" enctype="multipart/form-data" onsubmit="return Validate_addPro();">
		<legend>Thông tin sản phẩm</legend>
		<?php 
		foreach ($rs as $key => $value) {
			?>
			<div class="form-group">
				<label for="">Tên sản phẩm</label><span id="spanname" class="spanerror"></span>
				<input type="text" id="name_product" name="name_productR" class="form-control"  placeholder="" onblur="Blurname_product();" value="<?php echo $value['name_product']; ?>">
			</div>
			<div class="form-group">
				<label for="">ID sản phẩm</label>
				<input type="number"  class="form-control" value="<?php echo $value['id_product']; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="">Hãng</label>
				<select name="brand"  class="form-control">
					<?php 
					foreach ($rs_brand as $key => $brand) {
						?>
						<option value="<?php echo $brand['id_brand']; ?>" <?php if($value['id_brand']==$brand['id_brand']){echo "selected";} ?> ><?php echo $brand['name_brand']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Thể loại</label>
				<select name="type"  class="form-control">
					<?php 
					foreach ($rs_type as $key => $type) {
						?>
						<option value="<?php echo $type['id_type']; ?>" <?php if($value['id_type']==$type['id_type']){echo "selected";} ?> ><?php echo $type['name_type']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Giá gốc (Số liền, không dấu. VD:1000000)</label><span id="spanprice" class="spanerror"></span>
				<input type="number" class="form-control" name="priceR" value="<?php echo $value['price']; ?>"  placeholder="1000000" id="price_product" onblur="Blurprice()">
			</div>
			<div class="form-group"></span>
				<label for="">% Giảm giá</label><span id="spandiscount" class="spanerror"></span>
				<input type="number" name="discountR"  class="form-control" onblur="Blurdiscount()" id="discount" placeholder="0" value="<?php echo $value['discount']; ?>">
				
			</div>
			<div class="form-group"></span>
				<label for="">Giá đã chiết khấu</label>
				<input type="number" name="discount_price"  class="form-control"  id="discount_price" placeholder="" value="<?php if($value['discount']>0){echo $value['discount_price'];}else{echo $value['price'];}?>" readonly>
				
			</div>
			<div class="form-group">
				<p>Ảnh đại diện hiện tại 
					<img src="<?php echo $_SESSION['memory_avt']='../'.$value['img']; ?>" width="100px" alt="" id="avatar">
				</p>
				<label for="">Thay đổi ảnh đại diện</label><span id="spanimg" class="spanerror"></span>
				<input type="file"  name="imgR" id="input_avt" class="form-control"  placeholder="" onchange="validate_file();" accept=".webp,.jpg,.jpeg,.png">
			</div>
			
			<b>Danh sách ảnh mô tả sản phẩm hiện có:</b><br>
			<div id="load_list" >
				<div class="row" id="box_listimgR" >
					<?php
					foreach ($rs_listimg as $key => $listimg) {
						?>
						<div class="col-md-2" style="min-height: 300px;">
							<img src="../<?php echo $listimg['path']; ?>" style="" alt="" class="list_imgR"><button value="<?php echo $value['id_product']; ?>" memory_src_img="<?php echo $listimg['path']; ?>" class="btn_del_listimg">Xóa</button>
						</div>
						<?php
					}
					?>
					
					
					<div class="clearfix"></div><br>
					<div class="form-group">
						<div id="noti_add_list"></div>
						<label for="">Thêm ảnh mô tả mới</label><span id="spanlistimg" class="spanerror"></span>
						<input type="file" multiple="" name="list_imgR[]" class="form-control" onchange="validate_files()" id="list_img" accept=".webp,.jpg,.jpeg,.png">
					</div>
				</div>

			</div>
			
			<div class="form-group">
				<label for="">Số lượng</label><span id="spanquantity" class="spanerror"></span>
				<input type="number"  name="quantityR" class="form-control"  placeholder="" onblur="Blurquantity()" id="quantity" value="<?php echo $value['quantity']; ?>">
			</div>
			<div class="form-group">
				<label for="">Thời gian thêm sản phẩm</label>
				<input type="text"  name="created" class="form-control"  placeholder=""  id="created" value="<?php echo $value['created']; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="">Thời gian update gần đây nhất</label>
				<input type="text"  name="date_update" class="form-control"  placeholder=""  id="date_update" value="<?php echo $value['date_update']; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="">Mô tả sản phẩm</label>
				<textarea name="descriptionR"  cols="30" rows="10" class="ckeditor form-control"><?php echo $value['description']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="">Lịch sử cập nhật</label>
				<div style="overflow: scroll; width: 100%;height: 200px;" >
					<?php 
					$sx=0;
					foreach($get_info_noti_product as $key => $noti) {
						?>
						<label for="" style="color: red;"><?php  echo $sx+=1.;echo "."; ?></label>
						<p><?php echo $noti['content_noti']; ?></p><hr>
						<?php
					}
					?>
				</div>
			</div>

			<input type="submit" id="submit_editPro" name="edit_product" class="btn btn-primary" value="Cập nhật"> 
		</form>

		<?php
	}

	?>
	
</div>