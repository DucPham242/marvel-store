
					<!-- START Main-Content -->

					<h4 class="center_text">Thông tin tài khoản</h4><hr>
					<table class="table table-striped table-hover">
						<?php 
						foreach ($rs as $key => $value) {
							?>
							<tr>
							<td>Họ tên:</td>
							<td><?php echo $value['name_admin']; ?></td>
							<td></td>
						</tr>
						<tr>
							<td>Số điện thoại:</td>
							<td><?php echo $value['phone']; ?></td>
							<td></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><?php echo $value['email']; ?></td>
							<td></td>
						</tr>
						<tr>
							<td id="changepass" ><a href="">Đổi mật khẩu</a></td>
							<td id="">
								<div id="noti_changepass">
								<?php 
									if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==1){
										echo "<span style='color:red'> Mật khẩu hiện tại bạn nhập không đúng !</span>";
									}else if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==2){
										echo "<span style='color:green'> Đổi mật khẩu thành công !</span>";
									}else if(isset($_SESSION['noti_changepass']) && $_SESSION['noti_changepass']==3){
										echo "<span style='color:red'> Thất bại! Có lỗi trong quá trình đổi mật khẩu</span>";
									}
									unset($_SESSION['noti_changepass']);

								 ?>
								 </div>
							</td>
							<td></td>
						</tr>

							<?php
						}
						 ?>
						
						
						
					</table>
					<div id="box_changepass" style="width: 400px;margin: 0px auto;">
					</div>
