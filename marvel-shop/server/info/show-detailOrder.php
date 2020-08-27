<?php 
$ajax_flag=1;
include_once "../../controller/info_c.php";
$show = new Info_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id_order=(int)$_GET['id'];
	$rs=$show->getDetailOrder_Id($id_order);
	// echo "<pre>";
	// print_r($rs);
	// echo "</pre>";

	?>
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 style="color: red;"  class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h4 >
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="color: #0A277E;">Tên sản phẩm</th>
							<th style="color: #0A277E;">Số lượng mua</th>
							<th style="color: #0A277E;">Giá</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($rs as $key => $value) {
							?>
							<tr>
								<td><?php echo $value['name_product']; ?></td>
								<td><?php echo $value['quantity']; ?></td>
								<td><?php echo "<span class='span_price'>".number_format($value['total'])." đ"."</span>"; ?></td>
							</tr>
							<?php
						}

						?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
	<?php
}




?>