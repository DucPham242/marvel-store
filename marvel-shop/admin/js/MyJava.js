//Sự kiện thay đổi select option trạng thái đơn hàng trên bảng danh sách đơn hàng
function updateSTT_Order(id){
	var stt=$('#order'+id).val();
	var check=confirm("Bạn có muốn thay đổi trạng thái đơn hàng này không ?");
	var reason='';
	if(check){
		if(stt==5){
			var reason=prompt("Lý do đơn hàng này thất bại ?");
		}
		$.get('server/order/update_stt_order.php',{id:id,stt:stt,reason:reason},function(data) {
			alert(data);
			$("#table_order_boxout").load(" #table_order_boxin");
		});
	}
		$("#table_order_boxout").load(" #table_order_boxin");
}


//Cập nhật hình ảnh hiện tại cho trường input img
// function readURL(input) {
//             if (input.files && input.files[0]) {
//                 var reader = new FileReader();

//                 reader.onload = function (e) {
//                     $('#avatar')
//                         .attr('src', e.target.result);
//                 };

//                 reader.readAsDataURL(input.files[0]);
//             }
//         }

//Trường input chỉ cho nhập số
function onlyNum(){
	return event.charCode>=48 && event.charCode<=57;
}
function RulesPass(){
	return (event.charCode>=48 && event.charCode<=57) || (event.charCode>=97 && event.charCode<=122) || (event.charCode>=65 && event.charCode<=90);
}
//Phần này validate cho form
// START
function blur_phone(){
 	var phone = (document.getElementById('phone').value).trim();
 	var check = document.getElementById('spanphone');
 	var regexPhone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
 	if (phone == null || phone == '') {
 			check.innerHTML = "Bạn không đươc để trống";
 		}else if(!regexPhone.test(phone)) {
 			check.innerHTML = " Số điện thoại sai định dạng";
 		}else {
 			check.innerHTML = "";
 			return phone;
 		}
  }

function blur_address(){
	var address =(document.getElementById('address').value).trim();

 	var check = document.getElementById('spanaddress');

 	if (address == null || address == '') {
 			check.innerHTML = " Bạn không được để trống";
 		}else {
 			check.innerHTML = "";
 			return address;
 		}
}

function blur_email(){
 	var email = (document.getElementById('email').value).trim();
 	var check = document.getElementById('spanemail');
 	var regexEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 		if (email == null || email == '') {
 			check.innerHTML = " Bạn không được để trống";
 		}else if(!regexEmail.test(email)) {
 			check.innerHTML = " Email không hợp lệ";
 		}else {
 			check.innerHTML = "";
 			return email;
 		}
 }

 function blur_name(){
 	var name = (document.getElementById('name').value).trim();
 	var check = document.getElementById('spanname');
 	var regexName = /^[^\d+]*[\d+]{0}[^\d+]*$/;
 		if (name == null || name == '') {
 			check.innerHTML = " Bạn không được để trống";
 		}else if(!regexName.test(name)) {
 			check.innerHTML = "Trường họ tên không được chứa kí tự là số";
 		}else {
 			check.innerHTML = "";
 			return name;
 		}
 }

function Blurname_product(){
	var name=(document.getElementById('name_product').value).trim();
	var spanname=document.getElementById('spanname');
	if(name==''||name==null){
		spanname.innerHTML=" Tên sản phẩm không được để trống";
	}
	else {
		spanname.innerHTML="";
		return name;
	}
}
function Blurprice(){
	var price=(document.getElementById('price_product').value).trim();
	var spanprice=document.getElementById('spanprice');
	var regexPhone=/^\d+$/;
	if(price==''||price==null){
		spanprice.innerHTML="Giá không được để trống";
	}	
	else if(!regexPhone.test(price)){
		spanprice.innerHTML="Nhập sai kiểu giá"
	}
	else {
		spanprice.innerHTML="";
		return price;
	}

}
function BlurOrderPrice(){
	var price=(document.getElementById('orderprice').value).trim();
	var spanprice=document.getElementById('span_orderprice');
	var regexPhone=/^\d+$/;
	if(price==''||price==null){
		spanprice.innerHTML="Giảm giá không được để trống";
	}	
	else if(!regexPhone.test(price)){
		spanprice.innerHTML="Nhập sai kiểu giảm giá"
	}
	else {
		spanprice.innerHTML="";
		return price;
	}

}
function Blurtimeapply(){
	var price=(document.getElementById('timeapply').value).trim();
	var spanprice=document.getElementById('spand_timeapply');
	var regexPhone=/^\d+$/;
	if(price==''||price==null){
		spanprice.innerHTML="Giảm giá không được để trống";
	}	
	else if(!regexPhone.test(price)){
		spanprice.innerHTML="Nhập sai kiểu giảm giá"
	}
	else {
		spanprice.innerHTML="";
		return price;
	}

}
function Blurdiscount(){
	var price=(document.getElementById('discount').value).trim();
	var spanprice=document.getElementById('spandiscount');
	var regexPhone=/^\d+$/;
	if(price==''||price==null){
		spanprice.innerHTML="Giảm giá không được để trống";
	}	
	else if(!regexPhone.test(price)){
		spanprice.innerHTML="Nhập sai kiểu giảm giá"
	}
	else {
		spanprice.innerHTML="";
		return price;
	}

}
function Blurquantity(){
	var price=(document.getElementById('quantity').value).trim();
	var spanprice=document.getElementById('spanquantity');
	var regexPhone=/^\d+$/;
	if(price==''||price==null){
		spanprice.innerHTML="Số lượng không được để trống";
	}	
	else if(!regexPhone.test(price)){
		spanprice.innerHTML="Nhập sai kiểu số lượng"
	}
	else {
		spanprice.innerHTML="";
		return price;
	}

}

function blur_pass(){
 	var pass = (document.getElementById('pass').value).trim();
 	var check = document.getElementById('spanpass');
 		if (pass == null || pass == '') {
 			check.innerHTML = "Bạn không đươc để trống";
 		}else {
 			check.innerHTML = "";
 			return pass;
 		}
 }

 function blur_repass(){
 	var pass = (document.getElementById('pass').value).trim();
 	var repass = document.getElementById('repass').value;
 	var check = document.getElementById('spanrepass');
 		if (repass == null || repass == '') {
 			check.innerHTML = "Bạn không đươc để trống";
 		}else if(repass !== pass){
 			check.innerHTML = "Mật khẩu nhập lại không chính xác";
 		}else {
 			check.innerHTML = "";
 			return repass;
 		}
 }

function validate_file(){
	var inputfile=document.getElementById("input_avt");
	var file_error=document.getElementById("spanimg");
	var count=inputfile.files.length;
	var memory=0;
	for (var i = 0; i <count; i++) {
		var file_type =inputfile.files[i].type;
		if(file_type=='image/jpeg' || file_type=='image/jpg' || file_type=='image/webp' || file_type=='image/png'){
			file_error.innerHTML='';
		}else{
			file_error.innerHTML=' Lỗi! Định dạng ảnh phải là đuôi JPG, PNG, hoặc WEBP';
			return false;
		}
	}
	for (var i = 0; i <count; i++) {
		var file_size = inputfile.files[i].size;
		memory +=file_size;
		if(file_size>1500000) {
			file_error.innerHTML=' Mỗi ảnh phải có kích thước nhỏ hơn 1,5MB ';
			return false;
		}else if(file_size<=0){
			file_error.innerHTML=' Bạn chưa up load ảnh,vui lòng upload ít nhất 1 ảnh ';
		}else{
			file_error.innerHTML='';
		}
	}
	if(memory>20000000){
		file_error.innerHTML=" Tổng kích thước tất cả ảnh phải nhỏ hơn 20Mb";
		return false;
	}else{
		file_error.innerHTML='';
	}

	return true;
}
function validate_files(){
	var inputfile=document.getElementById("list_img");
	var file_error=document.getElementById("spanlistimg");
	var count=inputfile.files.length;
	var memory=0;
	for (var i = 0; i <count; i++) {
		var file_type =inputfile.files[i].type;
		if(file_type=='image/jpeg' || file_type=='image/jpg' ||file_type=='image/webp' || file_type=='image/png'){
			file_error.innerHTML='*';
		}else{
			file_error.innerHTML=' Lỗi! Định dạng ảnh phải là đuôi JPG, PNG, hoặc WEBP';
			return false;
		}
	}
	for (var i = 0; i <count; i++) {
		var file_size = inputfile.files[i].size;
		memory +=file_size;
		if(file_size>1500000) {
			file_error.innerHTML=' Mỗi ảnh phải có kích thước nhỏ hơn 1,5Mb ';
			return false;
		}else{
			file_error.innerHTML='';
		}
	}
	if(memory>20000000){
		file_error.innerHTML=" Tổng kích thước tất cả ảnh phải nhỏ hơn 20Mb";
		return false;
	}else{
		file_error.innerHTML='';
	}

	return true;
}
function Validate_addPro(){		//Kiểm tra kết quả bảng nhập phần sản phẩm
	if(Blurname_product() && Blurprice()&&Blurdiscount()&&Blurquantity()&&validate_file()&&validate_files()){

		return true;
	}
	else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;

	}
	
}

function Validate_editOrder(){ //Kiểm tra kết quả bảng nhập phần sản phẩm
	if(blur_name() && blur_phone() && blur_email() && blur_address()){
		return true;
	}else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;
	}
}

function Validate_addUser(){ //Kiểm tra kết quả bảng nhập phần sản phẩm
	if(blur_name() && blur_phone() && blur_email() && blur_address() && blur_pass() && blur_address()){
		return true;
	}else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;
	}
}
function Validate_editUser(){ //Kiểm tra kết quả bảng nhập phần sản phẩm
	if(blur_name() && blur_phone() && blur_email() && blur_address()){
		return true;
	}else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;
	}
}

function Validate_forgetPass(){ //Kiểm tra kết quả bảng nhập phần sản phẩm
	if(blur_pass() && blur_repass()){
		return true;
	}else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;
	}
}

function Validate_voucher(){ //validate cho phần thêm voucher
	if(BlurOrderPrice() && Blurtimeapply() && Blurdiscount() && blur_address()){
		return true;
	}else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;
	}
}
function Validate_admin(){ //validate cho phần thêm thành viên admin
	if(blur_name() && blur_phone() && blur_email()){
		return true;
	}else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;
	}
}
//END

//Phần này xử lý validate cho Form sửa sản phẩm
// START




$(document).ready(function () {

//Cập nhật hình ảnh hiện tại cho trường input img
$("#input_avt").change(function(e) {
	 if ($("#input_avt")[0].files && $("#input_avt")[0].files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL($("#input_avt")[0].files[0]);
            }
});


//Click xóa sản phẩm
$(document).on('click', '.btn_del_product', function(e) {
	e.preventDefault();
	var id=$(this).val();
	var check=confirm("Tất cả đơn hàng liên quan đến sản phẩm này sẽ bị xóa cùng. Quan trị viên vui lòng cân nhắc xử lý. Bạn có muốn xóa không?");
	if(check){
		$.get('server/product/del_product.php',{id:id}, function(data) {
			alert(data);
			$("#tbl_pro_boxout").load(" #tbl_pro_boxin");
		});

	}
});

// Mỗi khi alert hiện xog,load lại bảng danh sách
$(".alert").fadeOut(4000,function() {
	$("#tbl_pro_boxout").load(" #tbl_pro_boxin");
	$("#tbl_user_boxout").load(" #tbl_user_boxin");
	$("#tbl_voucher_boxout").load(" #tbl_voucher_boxin");
	$("#tbl_admin_boxout").load(" #tbl_admin_boxin");



});

// ẩn thông báo noti_changepass
$("#noti_changepass").fadeOut(4000);

//Click xoá 1 ảnh trong list ảnh - Phẩn sửa Sản phẩm
$(document).on('click', '.btn_del_listimg', function(e) {
	e.preventDefault();
	var id=$(this).val();
	var src=$(this).attr('memory_src_img');
	var check=confirm('Bạn có muốn xóa ảnh này không');
	if(check){
		$.get('server/product/del_img_inList.php',{id:id,src:src}, function(data) {
			$("#noti_add_list").html(data);
			$("#load_list").load(" #box_listimgR");
		});
	}
});

//Cập nhật dòng Giá đã chiết khấu, ở bảng sửa sản phẩm
$("#discount").change(function(e) {
	var price=parseFloat($("#price_product").val());
	var discount=parseFloat($("#discount").val());
	$("#discount_price").val(price-((price*discount)/100));
	
});
$("#price_product").change(function(e) {
	var price=parseFloat($("#price_product").val());
	var discount=parseFloat($("#discount").val());
	$("#discount_price").val(price-((price*discount)/100));
	
});
// END

//Click xóa đơn hàng
$(document).on('click', '.btn_del_order', function(e) {
	e.preventDefault();
	var id=$(this).val();
	var check=confirm("Bạn có muốn xóa đơn hàng này không ?");
	if(check){
		$.get('server/order/del_order.php',{id:id}, function(data) {
			alert(data);
			$("#table_order_boxout").load(" #table_order_boxin");
		});
	}
});




//Click xem chi tiết đơn hàng,show modal
$(document).on('click', '.btn_detail_order', function(e) {
	e.preventDefault();
	var id=$(this).val();
	$.get('server/order/show_detail_order.php',{id:id},function(data) {
		$("#exampleModal-2").html(data);
	});
});

//Click xoa User
$(document).on('click', '.btn_del_user', function(e) {
	e.preventDefault();
	var id = $(this).val();
	var check = confirm("Lưu ý: Sau khi xóa, các dữ liệu liên quan đến khách hàng này cũng sẽ mất.Quản trị viên hãy cân nhắc xử lý trước khi xóa. Bạn có muốn xóa khách hàng này ? ");
	if(check){
	$.get('server/user/del-user.php',{id:id}, function(data) {
		alert(data);
		$("#tbl_user_boxout").load(" #tbl_user_boxin");
	});
	}
});

//Click đổi mật khẩu trong profile
$(document).on('click', '#changepass', function(e) {
	e.preventDefault();
	$("#box_changepass_in").css('display', 'block');
});


//Click hủy của phần đổi mật khẩu profile
$(document).on('click', '#cancel_changepass', function(e) {
	e.preventDefault();
	$("#box_changepass_out").load(" #box_changepass_in");
});


//Click xoá voucher
$(document).on('click', '.btn_del_voucher', function(e) {
	e.preventDefault();
	var id=$(this).val();
	var check=confirm("Bạn có muốn xóa voucher này không ?");
	if(check){
		$.get('server/voucher/del-voucher.php',{id:id},function(data) {
			alert(data);
			$("#tbl_voucher_boxout").load(" #tbl_voucher_boxin");
		});
	}
});


//click xóa admin
$(document).on('click', '.btn_del_admin', function(e) {
	e.preventDefault();
	var id=$(this).val();
	var check=confirm("Bạn có muốn xóa thành viên này không ?");
	if(check){
		$.get('server/admin/del-admin.php',{id:id}, function(data) {
			alert(data);
		});
	}
	$("#tbl_admin_boxout").load(" #tbl_admin_boxin");
});

//load lại bảng khi thêm mới banner
$(".alert").fadeOut(5000,function() {
	$("#tbl_banner_boxout").load(" #tbl_banner_boxin");
});
//xử lý xóa ảnh banner
	$(document).on('click', '.btn_del_banner', function(e){
		e.preventDefault();
		var id = $(this).val();
		var check = confirm('Admin: có thực sự muốn xóa hình ảnh này không?');
		if (check) {
			$.get('server/product/del-banner.php', {id:id}, function(data){
				alert(data);
				$("#tbl_banner_boxout").load(" #tbl_banner_boxin");
			});
		}
	 });


//Click xem chi tiết đơn trên marquee noti_top,tạo SESSION['key_order'] tương
// ứng với ID của đơn đó => search ra đơn hàng
	$(".setSS_order").click(function(e) {
		var id=$(this).attr("id_order");
		$.get('server/order/setSS_order.php',{id:id}, function(data) {
		});
	});


//Click xem thêm phần hiển thị noti user
	$(document).on('click', '.more_user', function(e) {
		e.preventDefault();
		var from=parseInt($(".div_from:last").attr("from"))+5;
		$(".more_user").hide();
		$.get('server/user/more-noti-user.php',{from:from}, function(data) {
			$("#body_noti").append(data);
		});
	});

//Click xem thêm phần hiển thị noti product
	$(document).on('click', '.more_product', function(e) {
		e.preventDefault();
		var from=parseInt($(".div_from:last").attr("from"))+5;
		$(".more_product").hide();
		$.get('server/product/more-noti-product.php',{from:from}, function(data) {
			$("#body_noti").append(data);
		});
	});

//Click xem thêm phần hiển thị noti order
	$(document).on('click', '.more_order', function(e) {
		e.preventDefault();
		var from=parseInt($(".div_from:last").attr("from"))+5;
		$(".more_order").hide();
		$.get('server/order/more-noti-order.php',{from:from}, function(data) {
			$("#body_noti").append(data);
		});
	});

//JS cho chức năng sắp xếp bảng doanh thu theo ngày tháng
$(document).on('change', '#sort_report_date', function(e) {
	e.preventDefault();
	var ss=$("#sort_report_date").val();
	$.get('server/status/sort-report-date.php',{ss:ss}, function(data) {
		$("#report_date_box").load(" #table_report_date");
	});
});

//JS cho chức năng sắp xếp bảng doanh thu theo sản phẩm
$(document).on('change', '#sort_report_product', function(e) {
	e.preventDefault();
	var ss=$("#sort_report_product").val();
	$.get('server/status/sort-report-product.php',{ss:ss}, function(data) {
		$("#report_product_box").load(" #table_report_product");
	});
});

});

