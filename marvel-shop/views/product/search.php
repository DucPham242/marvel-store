<div class="container">
		<div class="row"  >
			<ol class="breadcrumb" >
				<li>Trang chủ</li>
				<li>Tìm kiếm</li>
				<li><?php echo str_replace("%","",$_SESSION['key']); ?></li>
			</ol>
		</div>
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="list-group" >
					<!-- <a id="item-group" href="" class="list-group-item active"> -->
						<h4 id="item-group" href="" class="list-group-item active" class="list-group-item-heading">Tìm kiếm: <?php echo str_replace("%","",$_SESSION['key']); ?></h4>	
					<!-- </a> -->
				</div>
			</div>
		</div>
		<div class="row">
			<?php 
				
				foreach ($rs_search as $key => $search) {
			?>

			<div class="col-md-3 col-xs-6 product_box">
						<div class="thumbnail" style="">
							<div class="set">
								<div href="#" style=""><img style="" src="<?php echo $search['img']; ?>" width="100%" alt="...">
									<button class="btn btn-danger shower"  data-toggle="modal" value="<?php echo $search['id_product']; ?>" data-target=".bs-example-modal-lg">Xem nhanh</button>
								</div>

							</div>

							

							<div class="caption" style="">

							<a href="product-detail/<?php echo $search['id_product'].'/'.$search['url_name']; ?>" style="color: #333333;"><h5><?php echo $search['name_product']; ?></h5></a>
							<hr>
							<?php 
								if ($search['discount'] <= 0) {
								
								
							 ?>
								<p class="caption_price_left"><?php echo number_format($search['price']).' đ'; ?></p>
							 <?php 
							}else{

							  ?>
								<span class="caption_price_left"><?php echo number_format($search['discount_price']).' đ'; ?></span><span class="caption_price_right"><?php echo number_format($search['price']).' đ'; ?></span>
							<?php } ?>
						</div>
						</div>
					</div>
				<?php } ?>
				<div class="modal fade bs-example-modal-lg modal_content" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					
				</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-push-4">
			<ul class="pagination">
								
								<?php 
								if (isset($_GET['pages']) && $_GET['pages'] > 1) {
									$back = $_GET['pages'] - 1;
									
									?>
									<li><a href="search/pages<?php echo $back; ?>">Back</a></li>
									<?php 
								}	
								?>
								<?php
									 // echo $pagination;
								for($i = 1; $i <= $pagination; $i++){
										if ($i > $current -3 && $i < $current + 3 ) {
											
										
									?>
									<li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="search/pages<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php 
								}
								}
								?>
								<?php 
								if (isset($_GET['pages']) && $_GET['pages'] < $pagination) {
									$next = $_GET['pages'] + 1;	
									?>
									<li><a href="search/pages<?php echo $next; ?>">Next</a></li>
									<?php 
								}	
								?>
							</ul>
		</div>
	</div>
	</div>