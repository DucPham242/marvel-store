<?php 
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=(int)$_GET['id'];
	$rs=$admin->getDetail_Order_Name($id);
	?>
	<div class="modal-dialog" role="document" style="width: 800px;">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng mua</th>
							<th>Giá bán tại thời điểm mua</th>
							<th>Tổng giá</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($rs as $key => $value) {
							?>
							<tr>
								<td ><?php echo $value['name_product']; ?></td>
								<td><?php echo $value['quantity']; ?></td>
								<td style="color: red;"><?php echo number_format($value['price'])." đ"; ?></td>
								<td style="color: red;"><?php echo number_format($value['total'])." đ"; ?></td>
							</tr>
							<?php
						}
						?>
						
					</tbody>
				</table>
				<a href="index.php?page=home&views=print&id=<?php echo $id; ?>" target="_blank"><button type="button" class="btn btn-default">In hoá đơn</button></a>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
<?php
}

?>