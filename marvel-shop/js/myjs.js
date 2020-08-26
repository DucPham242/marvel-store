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
	function updatecart(id){
		var qty=$('#'+id).val();
		$.get('server/update-cart.php',{id:id,qty:qty}, function(data) {
			$('#table-box-cart').load(' #cart-table');
  			$("#cartbox").load(" #reload_cartbox");
		});
	}



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


	//JS hiển thị phần raiting(đánh giá sao) cho sản phẩm
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
	
	//Click add cart hiện popup thông báo
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
			$("#cartbox").load(" #reload_cartbox");
		});
	});


//Click xóa sản phẩm trong trang Cart
	$(document).on('click', '.alert-del', function(e){
		
		e.preventDefault();
		var id = $(this).val();
	 var check = confirm("Bạn có chắc chắn muốn xóa không?");
	if(check){
		$.post('server/del-pro.php', {id: id}, function(data){
  		$('#table-box-cart').load(' #cart-table');
  		$("#cartbox").load(" #reload_cartbox");
	 	});
	}	
	});

//Click xóa sản phẩm trên cart hover
	$(document).on('click', '.cart-hover-del', function(e){
		
		e.preventDefault();
		var id = $(this).val();
		var checkCartHover = confirm("Bạn có chắc chắn muốn xóa không?")
		if (checkCartHover) {
		$.post('server/del-pro.php', {id: id}, function(data){
  		$('#table-box-cart').load(' #cart-table');
  		$("#cartbox").load(" #reload_cartbox");
	 	});
	}
	});

//tắt thông báo alert
$(".alert").delay(4000).slideUp();

//Click xem chi tiết,hiển thị chi tiết đơn hàng. Phần Thông tin tài khoản
$(document).on('click', '.check_detail_order', function(e) {
	e.preventDefault();
	var id=$(this).val();
	$.get('server/show-detailOrder.php',{id:id},function(data) {
		$("#exampleModal").html(data);

	});
});


//Khu vực xử lý chức năng sửa địa chỉ khách hàng--------START
//Nhấn vào sửa địa chỉ,hiện textarea
$(document).on('click', '#edit_address', function(e) {
	e.preventDefault();
	$.post('server/edit-address.php',function(data) {
		$("#address").html(data);
	});
});
//click nút sửa,sửa lại địa chỉ.load lại box address
$(document).on('click', '#submit_editaddress', function(e) {
	e.preventDefault();
	var content=$("#txtaddress").val();
	var id=$("#submit_editaddress").val();
	$.get('server/btn-editaddress.php', {content:content,id:id}, function(data) {
		$("#address_box").load(" #address");
	});
});
//Click hủy, load lại box address
$(document).on('click', '#cancel_edit', function(e) {
	e.preventDefault();
	$("#address_box").load(" #address");
});
// -------Sửa địa chỉ----END----



//Ẩn hiện content Bank
$("#payment_bank").click(function(e) {
	$("#bank_info").removeClass('hide_or_show');
});
$("#payment_ship").click(function(e) {
	$("#bank_info").addClass('hide_or_show');
});

})

