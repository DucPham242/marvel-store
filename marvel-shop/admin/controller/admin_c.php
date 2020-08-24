<?php 
if(isset($ajax_flag)){
	include_once '../../model/admin_m.php';
}else{
	include_once 'model/admin_m.php';
}

/**
 * 
 */
class Admin_c extends Admin_m
{
	private $ad;

	public function __construct()
	{
		$this->ad=new Admin_m();
	}
//Các hàm cho Ajax
//Lấy hàm xóa sản phẩm dùng cho Ajax
	public function del_Product($id){
		return $this->ad->del_Product($id);
	}

	public function create_page(){
		if(isset($_GET['views'])){
			$views=$_GET['views'];
		}else{
			$views='status';
		}

		switch ($views) {
			case 'status':

			include_once "views/status.php";
			break;

			case 'control':

			include_once "views/control.php";
			break;

			case 'product':
		

			$rs=$this->ad->getProduct();
			$rs=$this->ad->add_discount($rs);
			// echo "<pre>";
			// print_r($rs);
			// echo "</pre>";

			$rs_brand=$this->ad->getBrand();
			$rs_type=$this->ad->getType();
			if(isset($_POST['add_product'])){
				$img=$_FILES['img'];
				$list_img=$_FILES['list_img'];
				$name_product=$_POST['name_product'];
				$id_brand=$_POST['brand'];
				$id_type=$_POST['type'];
				$price=$_POST['price'];
				$discount=$_POST['discount'];
				$quantity=$_POST['quantity'];
				$description=$_POST['description'];

				$files=array();
				$files=$this->ad->ChangeArrayFile($list_img,$files);
				 
				$add_pro=$this->ad->addProduct($name_product,$id_brand,$id_type,$price,$discount,$quantity,$description);
				if($add_pro){
					$id_last=$this->ad->lastInsertId();
					$uploadPath = "../images/product/".$id_last;
					if (!is_dir($uploadPath)) { // Nếu k tồn tại thư mục này thì tạo thư mục
        			mkdir($uploadPath, 0777, true);
    				}
    				//Thêm ảnh avatar
    				move_uploaded_file($img['tmp_name'],$memmory_path=$uploadPath.'/'.time().'_avatar_'.$img['name']);
    				$uploadPath_real=substr($memmory_path,3);//Đường dẫn thực để insert vào trường img bảng tbl_product
    				$add_img=$this->ad->addImg_Product($uploadPath_real,$id_last);
    				//Thêm list ảnh
    				foreach ($files as $key => $value) {
    				move_uploaded_file($value['tmp_name'],$memmory_path=$uploadPath.'/'.time().'_'.$value['name']);
    				$uploadPath_real=substr($memmory_path,3);
    				$add_list=$this->ad->add_List_img($id_last,$uploadPath_real);
    				}
    				echo "Thêm thành công";
    				
				}else{
					echo "Thêm thất bại";
				}

    			
			}

			


			include_once "views/product.php";
			break;

			case 'order':

			include_once "views/order.php";
			break;

			case 'customer':

			include_once "views/customer.php";
			break;

			case 'user':

			include_once "views/user.php";
			break;
			
			default:
			header("Location:index.php");
			break;
		}
	}


}


?>