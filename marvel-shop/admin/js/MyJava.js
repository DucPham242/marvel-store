
//Phần này validate cho form thêm sản phẩm
// START
function Blurname_product(){
	var name=document.getElementById('name_product').value;
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
	var price=document.getElementById('price_product').value;
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
function Blurdiscount(){
	var price=document.getElementById('discount').value;
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
	var price=document.getElementById('quantity').value;
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
function validate_file(){
	var inputfile=document.getElementById("img");
	var file_error=document.getElementById("spanimg");
	var count=inputfile.files.length;
	var memory=0;
	for (var i = 0; i <count; i++) {
		var file_type =inputfile.files[i].type;
		if(file_type=='image/jpeg' || file_type=='image/webp' || file_type=='image/png'){
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
		if(file_type=='image/jpeg' || file_type=='image/webp' || file_type=='image/png'){
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
function Validate_addPro(){		
	if(Blurname_product() && Blurprice()&&Blurdiscount()&&Blurquantity()&&validate_file()&&validate_files()){
	
		return true;
	}
	else{
		alert('Dữ liệu nhập vào chưa đúng, yêu cầu kiểm tra lại !');
		return false;

	}
	
}
//END

//Phần này xử lý validate cho Form sửa sản phẩm
// START




$(document).ready(function () {

// // JS cho table MD bootstrap
// var table=$('#dtBasicExample').DataTable({
// "searching": true,//Bật chế độ search
// });
// $('.dataTables_length').addClass('bs-select');


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

// Mỗi khi alert hiện xog,load lại bảng product
$(".alert").fadeOut(5000,function() {
	$("#tbl_pro_boxout").load(" #tbl_pro_boxin");
});

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


