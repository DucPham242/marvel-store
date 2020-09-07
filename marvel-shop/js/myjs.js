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
	$.get('server/product/update-cart.php',{id:id,qty:qty}, function(data) {
		$('#table-box-cart').load(' #cart-table');
		$("#cartbox").load(" #reload_cartbox");
	});
}



	// làm mô tả từng ảnh
	$(document).ready(function(){

		if($("#ship").attr("checked")=='checked'){
	$.post('server/info/changeSS-35k.php', function(data) {
	
	});
	$.post('server/info/voucherDefault.php', function(data) {
		
	});
	$("#price_table_box").load(" #content_price_table");
}
		//Thiết lập sẵn SS price ship và voucherdefault
		if($("#ship").attr("checked")=='checked'){
			$.post('server/info/changeSS-35k.php', function(data) {
				
			});
			$.post('server/info/voucherDefault.php', function(data) {
				
			});
			$("#price_table_box").load(" #content_price_table");
		}

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
		$.post('server/product/show-modal.php', {id: id}, function(data) {
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
		$.get('server/product/add-card.php',{id: id}, function(data) {
			$("#cartbox").load(" #reload_cartbox");
		});
	});


//Click xóa sản phẩm trong trang Cart
$(document).on('click', '.alert-del', function(e){
	
	e.preventDefault();
	var id = $(this).val();
	var check = confirm("Bạn có chắc chắn muốn xóa không?");
	if(check){
		$.post('server/product/del-pro.php', {id: id}, function(data){
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
		$.post('server/product/del-pro.php', {id: id}, function(data){
			$('#table-box-cart').load(' #cart-table');
			$("#cartbox").load(" #reload_cartbox");
		});
	}
});

$("#alert1").fadeOut(7000).slideUp();

//tắt thông báo alert
$(".alert").delay(4000).slideUp();



//Click xem chi tiết,hiển thị chi tiết đơn hàng. Phần Thông tin tài khoản
$(document).on('click', '.check_detail_order', function(e) {
	e.preventDefault();
	var id=$(this).val();
	$.get('server/info/show-detailOrder.php',{id:id},function(data) {
		$("#exampleModal").html(data);

	});
});


//Khu vực xử lý chức năng sửa địa chỉ khách hàng--------START
//Nhấn vào sửa địa chỉ,hiện textarea
$(document).on('click', '#edit_address', function(e) {
	e.preventDefault();
	$.post('server/btn_edit_address/edit-address.php',function(data) {
		$("#address").html(data);
	});
});
//click nút sửa,sửa lại địa chỉ.load lại box address
$(document).on('click', '#submit_editaddress', function(e) {
	e.preventDefault();
	var content=$("#txtaddress").val();
	var id=$("#submit_editaddress").val();
	$.get('server/btn_edit_address/btn-editaddress.php', {content:content,id:id}, function(data) {
		$("#address_box").load(" #address");
	});
});
//Click hủy, load lại box address
$(document).on('click', '#cancel_edit', function(e) {
	e.preventDefault();
	$("#address_box").load(" #address");
});
// -------Sửa địa chỉ----END----



//Ẩn hiện content Bank, và load lại SS ship price
$("#payment_ship").click(function(e) {
	$("#bank_info").addClass('hide_or_show');
	$.post('server/info/changeSS-35k.php', function(data) {
		
	});
	$("#price_table_box").load(" #content_price_table");
});
$("#payment_bank").click(function(e) {
	$("#bank_info").removeClass('hide_or_show');
	$.post('server/info/changeSS-0.php', function(data) {
		
	});
	$("#price_table_box").load(" #content_price_table");
});
// if($("#ship").attr("checked")=='checked'){
// 	$.post('server/info/changeSS-35k.php', function(data) {
	
// 	});
// 	$.post('server/info/voucherDefault.php', function(data) {
// 	});
// 	$("#price_table_box").load(" #content_price_table");
// }

})
 // END

//Phần xử lý mã giảm giá voucher
$(document).on('click', '#submit_voucher', function(e) {
	e.preventDefault();
	var code=$("#code_voucher").val();
	$.get('server/info/check_voucher.php',{code:code}, function(data) {
		$("#noti_voucher").html(data);
		$("#price_table_box").load(" #content_price_table");
	});
});

 // làm phần Validate kiểm tra thông tin đăng kí

 function blur_name(){
 	var name = (document.getElementById('name').value).trim();
 	var check = document.getElementById('check');
 	var regexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;
 	if (name == null || name == '') {
 		check.innerHTML = "Bạn không đươc để trông bất kì trường nào";
 	}else if(!regexName.test(name)) {
 		check.innerHTML = "Trường họ tên không được chứa kí tự là số";
 	}else {
 		check.innerHTML = "";
 		return name;
 	}
 }
 function blur_phone() {
 	var phone = (document.getElementById('phone').value).trim();
 	var check = document.getElementById('check');
 	var regexPhone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
 	if (phone == null || phone == '') {
 		check.innerHTML = "Bạn không đươc để trông bất kì trường nào";
 	}else if(!regexPhone.test(phone)) {
 		check.innerHTML = " Số điện thoại sai định dạng";
 	}else {
 		check.innerHTML = "";
 		return phone;
 	}
 }
 function blur_addr(){
 	var address = (document.getElementById('address').value).trim();
 	var check = document.getElementById('check');
 	if (address == null || address == '') {
 		check.innerHTML = "Bạn không đươc để trông bất kì trường nào";
 	}else {
 		check.innerHTML = "";
 		return address;
 	}
 }
 function blur_email(){
 	var email = (document.getElementById('email').value).trim();
 	var check = document.getElementById('check');
 	var regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 	if (email == null || email == '') {
 		check.innerHTML = " Bạn không đươc để trông bất kì trường nào";
 	}else if(!regexEmail.test(email)) {
 		check.innerHTML = " Email của bạn không hợp lệ";
 	}else {
 		check.innerHTML = "";
 		return email;
 	}
 }
 function blur_pass(){
 	var pass = (document.getElementById('pass').value).trim();
 	var check = document.getElementById('check');
 	if (pass == null || pass == '') {
 		check.innerHTML = "Bạn không đươc để trông bất kì trường nào";
 	}else {
 		check.innerHTML = "";
 		return address;
 	}
 }
 function blur_repass(){
 	var pass = (document.getElementById('pass').value).trim();
 	var repass = document.getElementById('repass').value;
 	var check = document.getElementById('check');
 	if (repass == null || repass == '') {
 		check.innerHTML = "Bạn không đươc để trông bất kì trường nào";
 	}else if(repass !== pass){
 		check.innerHTML = "Mật khẩu không trùng nhau";
 	}else {
 		check.innerHTML = "";
 		return address;
 	}
 }
 function Validate_addUser(){
 	if(blur_name() && blur_phone() && blur_addr() && blur_email() && blur_pass() && blur_repass()){
 		
 		return true;
 	}
 	else{
 		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
 		return false;

 	}
 }
