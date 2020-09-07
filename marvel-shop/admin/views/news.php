<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin: 30px 0px 40px 20px">
	Thêm bài viết mới
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm bài viết</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" onsubmit="return Validate_addPro();" method="POST" role="form" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Tên tiêu đề</label><span id="spanname" class="spanerror"></span>
						<input type="text" id="name_product" name="name_new" class="form-control"  placeholder="" onblur="Blurname_product()">
					</div>
					<div class="form-group">
						<label for="">Thêm nội dung</label>
						<textarea name="content"  cols="30" rows="10" class="ckeditor form-control">
						</textarea>
					</div>

					<button type="submit" id="submit_addPro" name="add_new" class="btn btn-primary">Thêm</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php if(isset($_SESSION['news']) && $_SESSION['news'] == 1){
	?>
	<div class="alert alert-success" style="display: inline;">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thêm thành công!</strong> 
	</div>
	<?php
	
} else if(isset($_SESSION['news']) && $_SESSION['news'] == 2){
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại ! Có lỗi trong quá trình thêm</strong>
	</div>
	<?php

}else if(isset($_SESSION['news']) && $_SESSION['news'] == 3){
	?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Sửa thành công!</strong>
	</div>
	<?php

}else if(isset($_SESSION['news']) && $_SESSION['news'] == 4){
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thất bại ! Có lỗi trong quá trình sửa</strong>
	</div>
	<?php

}
unset($_SESSION['news']);
?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tiêu đề</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$stt = 0;
		foreach ($get_new as $key => $value) {
			$stt += 1;
			 // echo '<pre>';
    //             print_r($get_new);
			?>
			<tr>
				<td><?php echo $stt; ?></td>
				<td><?php echo $value['title']; ?></td>
				<?php 
				if($_SESSION['stt_admin']==1){
					?>
					<td><div id="tbl_banner_boxin">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" >
							Xem chi tiết bài viết và sửa nội dung
						</button>

						<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Sửa nội dung</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<form action="" method="POST" role="form" enctype="multipart/form-data">
												<label for="">Sửa nội dung</label>
												<textarea name="content"  cols="30" rows="10" class="ckeditor form-control">
													<?php echo $value['content']; ?></textarea>
													<button type="submit" id="submit_addPro" name="edit_news" class="btn btn-primary">Chinh sửa</button>
												</form>
											</div>
											<div class="form-group" style="text-align: left">
												<?php echo $value['content']; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>	
					<?php } ?>	
				</tr>
			<?php } ?>
		</tbody>
	</table>