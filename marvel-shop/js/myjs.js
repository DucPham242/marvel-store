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

	$(document).on('click', '.list_img_product', function(e) {

		e.preventDefault();
		$(this).parent().addClass('addshadow');
		var src_this=$(this).attr('src');
		$('#at_img').attr('src',src_this);
		$(this).parent().prevAll().removeClass('addshadow');
		$(this).parent().nextAll().removeClass('addshadow');
		
	});


	//JS cho raiting
	$(document).on('click', '.star', function(e) {
			id=$(this).attr('id');
			// alert(id);
			$(this).attr('src','../images/gold_star.png');
			$(this).prevAll().attr('src','../images/gold_star.png');
			$(this).nextAll().attr('src','../images/white_star2.png');
			$('.'+id).click();
	});

	//click on top		
		$(window).scroll(function(){
			if ($(this).scrollTop() > 240){
	 			$('.back-top').fadeIn();
			}else {
				$('.back-top').fadeOut();
			}
		
			
	});
	$('.back-top').click(function(){
		// alert(1);
		$('html, body').animate({scrollTop : 0},600);
	
	});

})



