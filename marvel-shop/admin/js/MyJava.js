
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
		if(file_size>500000) {
			file_error.innerHTML=' Mỗi ảnh phải có kích thước nhỏ hơn 500kb ';
			return false;
		}else{
			file_error.innerHTML='';
		}
	}
	if(memory>10000000){
		file_error.innerHTML=" Tổng kích thước tất cả ảnh phải nhỏ hơn 10Mb";
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
		if(file_size>500000) {
			file_error.innerHTML=' Mỗi ảnh phải có kích thước nhỏ hơn 500kb ';
			return false;
		}else{
			file_error.innerHTML='';
		}
	}
	if(memory>10000000){
		file_error.innerHTML=" Tổng kích thước tất cả ảnh phải nhỏ hơn 10Mb";
		return false;
	}else{
		file_error.innerHTML='*';
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


$(document).ready(function () {

// // JS cho table MD bootstrap
// var table=$('#dtBasicExample').DataTable({
// "searching": true,//Bật chế độ search
// });
// $('.dataTables_length').addClass('bs-select');



$(document).on('click', '.btn_del_product', function(e) {
	e.preventDefault();
	var id=$(this).val();
	var check=confirm("Bạn có muốn xóa sản phẩm này không ?");
	if(check){
		$.get('server/product/del_product.php',{id:id}, function(data) {
			alert(data);
			$("#tbl_pro_boxout").load(" #tbl_pro_boxin");
		});

	}
});

$(".alert").fadeOut(3000,function() {
	$("#tbl_pro_boxout").load(" #tbl_pro_boxin");
});





});

