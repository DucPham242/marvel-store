<?php 
session_start();
$ajax_flag=1;
include_once "../../controller/product_c.php";
$show = new Product_c();
if(isset($_POST['id']) && $_POST['id']>0){
	$id=(int)$_POST['id'];
	$rs=$show->getProduct_Id($id);
	$rs=$show->add_discount($rs);
	$rs_listimg=$show->get_Listimg($id);
	// echo "<pre>";
	// print_r($rs_listimg);
	// echo "</pre>";
	

	foreach ($rs as $key => $value) {
		?>

		<div class="modal-dialog modal-lg ">
			<div class="modal-content" style="padding: 40px;">
				<div class="row">
					<div class="col-md-8" >
						<div class="detail_modal"><img id="at_img" src="<?php echo $value['img']; ?>" alt="" width="300px"></div>
						<div class="row" >
							<?php 
							foreach ($rs_listimg as $key => $list){
								?>
								<div class="col-md-2" ><img class="list_img_detail" src="<?php echo $list['path']; ?>" alt=""></div>
								<?php
							}

							?>
						</div>
					</div>
					<div class="col-md-4">
						<div style="text-align: left">
							<h3><?php echo $value['name_product']; ?></h3>
							<h4>Mô tả sản phẩm:</h4>
							<?php 
							if ($value['discount'] <= 0) {


								?>
								<p style="color: #E92020;font-size: 18px;font-weight: bold;">Giá sản phẩm: <?php echo number_format($value['price']). ' đ'; ?> </p>
								<?php
							}else{
								?>
								<p style="text-decoration: line-through;color: gray"><?php echo number_format($value['price']). ' đ'; ?></p>
								<p style="color: #E92020;font-size: 18px;font-weight: bold;">Giá sản phẩm: <?php echo number_format($value['discount_price']). ' đ'; ?></p>
								<?php 
							}
							?>
							<?php 
							if ($value['quantity'] <= 0) {

								?>
								<h4 style="red">Sản phẩm này tạm thời hết hàng!</h4>
								<?php 
							}else{
								?>
								<button class="button add-cart add-alert" value="<?php echo $value['id_product']; ?>" type="button">Add To Cart</button>
								<?php 
							}
							?>
						</div>

					</div>
				</div>
			</div>

		</div>

		<?php
	}
}
?>