 // $(document).ready(function(){

	// var nav = jQuery("nav").offset().top; // đo khoảng cách từ top đến nav
	
	// jQuery(window).scroll(function(){ // để mỗi khi cuộn dòng trong function sẽ được kích hoạt
	// 	var scrollPos = jQuery(window).scrollTop(); //Hiện giá trị khi cuộn
	// 	// jQuery(".status").html(scrollPos);
	// 	if ( scrollPos >= nav) {
	// 		jQuery("nav").addClass("fixed");
	// 	}else {
	// 		jQuery("nav").removeClass("fixed");
	// 	}
	// })
// })

	// làm mô tả từng ảnh
$(document).ready(function(){
	//JS hiệu ứng list ảnh ở phần Xem trước sản phẩm
	$(document).on('click', '.list_img_detail', function(e) {

		e.preventDefault();
		$(this).parent().addClass('addshadow');
		var src_this=$(this).attr('src');
		$('#at_img').attr('src',src_this);
		$(this).parent().prevAll().removeClass('addshadow');
		$(this).parent().nextAll().removeClass('addshadow');
		
	});

	// fix drop-down at show-all page
	$(document).on('click', '.hidden-drop', function(){
		var target_this = $(this).attr('data-target');
		$(this).parent().prevAll().removeClass('collapse');
		$(this).parent().nextAll().removeClass('collapse');
	})

	//JS hiệu ứng list ảnh ở phần Xem chi tiết của sản phẩm
	$(document).on('click', '.list_img_product', function(e) {
		e.preventDefault();
		$(this).parent().addClass('addshadow');
		var src_this=$(this).attr('src');
		$('#at_image').attr('src',src_this);
		$(this).parent().prevAll().removeClass('addshadow');
		$(this).parent().nextAll().removeClass('addshadow');
		
	});


	//JS cho raiting(đánh giá sao) cho sản phẩm
	$(document).on('click', '.star', function(e) {
			id=$(this).attr('id');
			// alert(id);
			$(this).attr('src','images/gold_star.png');
			$(this).prevAll().attr('src','images/gold_star.png');
			$(this).nextAll().attr('src','images/white_star2.png');
			$('.'+id).click();
	});

	//click button trở về đầu trang	
		$(window).scroll(function(){
			if ($(this).scrollTop() > 1400){
	 			$('.back-top').fadeIn();
			}else {
				$('.back-top').fadeOut();
			}		
	});
	$('.back-top').click(function(){
		$('html, body').animate({scrollTop : 0},1000);
	});


	//Click vào Xem trước sản phẩm, hiện Modal
	$(document).on('click', '.shower', function() {
		var id=$(this).val();
		$.post('server/show-modal.php', {id: id}, function(data) {
			$('.modal_content').html(data);
		});

	});
	$(document).on('click', '.add-alert', function(){
		// swal("Chúc mừng", "Bạn đã đặt hàng thành công!", "success");
		swal({
			  title: "Chúc mừng",
			  text: "Đã thêm hàng vào giỏ thành công!",
			  icon: "success",
			  buttons: [false],
			  timer: 1500
			});
	
	})

	//Click add to card
	$(document).on('click', '.add-alert', function(e) {
		e.preventDefault();
		var id = $(this).val();
		$.get('server/add-card.php',{id: id}, function(data) {
<<<<<<< HEAD
		
=======
			$("#reload-cart").load(" .show-cart");
>>>>>>> 42fb0437b301d64daa1beb30757ca87d7a885725
		});
	});



})



