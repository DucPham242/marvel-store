

$(document).ready(function () {

//JS cho table MD bootstrap
$('.mytable').DataTable({

"searching": true //Bật chế độ search
});
$('.dataTables_length').addClass('bs-select');


$(".btn_del_product").click(function(e) {
	e.preventDefault();
	var id=$(this).val();
	var check=confirm("Bạn có muốn xóa sản phẩm này không ?");
	if(check){
		$.get('server/product/del_product.php',{id:id}, function(data) {
			alert(data);
			
			$('.mytable').DataTable().ajax.reload(null, false);
		});

	}
});

$("#test").click(function(event) {
	event.preventDefault();
	$('.mytable').DataTable().ajax.reload();

});

});