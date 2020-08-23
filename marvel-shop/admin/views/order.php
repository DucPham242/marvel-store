
					<!-- START Main-Content -->
					
					<!-- Tìm kiếm -->
					<form action="" method="POST" role="form" >
						
						<div class="form-group" >
							<input type="text" class="form-control col-md-11" id="" placeholder="Tim kiếm đơn hàng"><button type="submit" class="btn btn-default col-md-1">Tìm kiếm</button><br><br><br>


						</div>
					</form>
					<!-- END Tìm kiếm -->


					<!-- Button trigger modal -->
					

				

					<!-- Product View Table -->
					<h4 class="center_text">Danh Sách Đơn Hàng </h4>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>ID Order</th>
								<th>ID User</th>
								<th>Họ tên</th>
								<th>Tổng tiền</th>
								<th>Tình trạng</th>
								<th>Ngày đặt</th>
								<th>Action</th>
								<th>Chi tiết</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11111111</td>
								<td>2135</td>
								<td>11276</td>
								<td>Hoàng Văn Lâm</td>
								<td>12.000.000 đ</td>
								<td>Đang chờ xử lý</td>
								<td>2020-07-18 16:46:20</td>
								<td>
									<button type="button" class="btn btn-primary"
									data-toggle="modal" data-target="#exampleModal-1" data-backdrop="static" data-keyboard="false">Sửa</button>
									<button type="button" class="btn btn-danger" >Xóa</button>

								</td>
								<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal-2" data-backdrop="static" data-keyboard="false">Chi tiết đơn</button><br></td>
							</tr>
						</tbody>
					</table>
					<!-- END Product View Table -->

					<!-- Modal 1 -->
						<div class="modal fade" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
							<div class="modal-dialog" role="document" style="background: red;width: 1000px;">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Đơn hàng</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="POST" role="form">
											<legend>Đơn hàng</legend>
										
											<div class="form-group">
												<label for="">ID Order</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="232145">
											</div>
											<div class="form-group">
												<label for="">ID User</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="232145">
											</div>
											<div class="form-group">
												<label for="">Phương thức thanh toán</label>
												<select name="" id="" class="form-control">
													<option value="1">Ship Cod</option>
													<option value="2">Chuyển khoản</option>
												</select>
											</div>
											<div class="form-group">
												<label for="">Tổng tiền</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="10,000,000 đ">
											</div>
											<div class="form-group">
												<label for="">Ghi chú</label>
												<textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
											</div>
											<div class="form-group">
												<label for="">Tình trạng</label>
												<select name="" id="" class="form-control">
													<option value="1">Đang xử lý</option>
													<option value="2">Đã đóng gói, chuẩn bị giao hàng</option>
													<option value="3">Hoàn tất</option>
													<option value="4">Thất bại</option>
												</select>
											</div>
											
										
											
										
											<button type="submit" class="btn btn-primary">Sửa</button>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
									</div>
								</div>
							</div>
						</div>
						<!-- END Modal -->

						<!-- Modal 2 -->
						<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
							<div class="modal-dialog" role="document" style="width: 1000px;">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="POST" role="form">
											<legend>Sản phẩm 1</legend>
										
											<div class="form-group">
												<label for="">Tên sản phẩm</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="Iron man MK5" >
											</div>
											<div class="form-group">
												<label for="">Số lượng mua</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="5" >
											</div>
											<div class="form-group">
												<label for="">Giá bán sản phẩm</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="12,000,000 đ" >
											</div>
											<div class="form-group">
												<label for="">Tổng giá đơn hàng</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="120,000,000 đ" >
											</div>
											<div class="form-group">
												<label for="">Tình trạng</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="1" >
											</div>
										
											
										
											<button type="submit" class="btn btn-primary">Sửa</button>
										</form><hr><br>
										<form action="" method="POST" role="form">
											<legend>Sản phẩm 2</legend>
										
											<div class="form-group">
												<label for="">Tên sản phẩm</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="Iron man MK5" >
											</div>
											<div class="form-group">
												<label for="">Số lượng mua</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="5" >
											</div>
											<div class="form-group">
												<label for="">Giá bán sản phẩm</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="12,000,000 đ" >
											</div>
											<div class="form-group">
												<label for="">Tổng giá đơn hàng</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="120,000,000 đ" >
											</div>
											<div class="form-group">
												<label for="">Tình trạng</label>
												<input type="text" class="form-control" id="" placeholder="Input field" value="1" >
											</div>
										
											
										
											<button type="submit" class="btn btn-primary">Sửa</button>
										</form>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
									</div>
								</div>
							</div>
						</div>
						<!-- END Modal -->