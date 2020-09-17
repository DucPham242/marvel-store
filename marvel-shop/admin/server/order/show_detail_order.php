<?php 
$ajax_flag=1;
include_once"../../controller/admin_c.php";
$admin=new Admin_c();
if(isset($_GET['id']) && $_GET['id']>0){
	$id=(int)$_GET['id'];
	$rs=$admin->getDetail_Order_Name($id);
	$rs_order=$admin->getOrder_ID($id);
	$rs_noti=$admin->get_noti_order_ID($id);
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
				<br>
				<hr>
				<table class="table table-hover">
					<tbody>
						<?php foreach ($rs_order as $key => $order) {
							?>
							<tr>
							<td><label for="">Tên khách hàng</label></td>
							<td><?php echo $order['name']; ?></td>
							</tr>
							<tr>
								<td><label for="">Số điện thoại</label></td>
								<td><?php echo $order['phone']; ?></td>
							</tr>
							<tr>
								<td><label for="">Địa chỉ</label></td>
								<td><?php echo $order['address']; ?></td>
							</tr>
							<tr>
								<td><label for="">Email liên hệ</label></td>
								<td><?php echo $order['email']; ?></td>
							</tr>
							<tr>
								<td><label for="">Tổng tiền</label></td>
								<td><?php echo number_format($order['total']).' VNĐ'; ?></td>
							</tr>
							<?php
						} ?>
					</tbody>
				</table>
		
					<div style="overflow: scroll; width: 100%;height: 200px;" >
			<?php 
			$stt=0;
			foreach($rs_noti as $key => $noti) {
				?>
				<label for="" style="color: red;"><?php  echo $stt+=1.;echo "."; ?></label><p><?php echo $noti['content_noti']; ?></p><hr>
				<?php
			}
			 ?>
		</div>


				<div class="modal-footer">
					<a id="btn_print" href="index.php?page=home&views=print&id=<?php echo $id; ?>" target="_blank"><button type="button" class="btn btn-default">In hoá đơn</button></a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
<?php
}

?>