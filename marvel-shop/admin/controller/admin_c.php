<?php 
if(isset($ajax_flag)){
	include_once '../model/admin_m.php';
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
				echo "<hr><pre>";
				print_r($img);
				echo "</pre>";

				$files=array();
				$files=$this->ad->ChangeArrayFile($list_img,$files);
				echo "<hr><pre>";
				print_r($files);
				echo "</pre>";
				$uploadPath = "../images/product/".$name_product;
				echo $uploadPath."<br>";
				 if (!is_dir($uploadPath)) {
        			mkdir($uploadPath, 0777, true);
    			}	
    			move_uploaded_file($img['tmp_name'],$memmory_path=$uploadPath.'/'.time().'_avatar_'.$img['name']);
    			$uploadPath_real=substr($memmory_path,3);//Đường dẫn thực để insert vào trường img bảng tbl_product
    			echo $uploadPath_real;

				$add_pro=$this->ad->addProduct($name_product,$id_brand,$id_type,$price,$uploadPath_real,$discount,$quantity,$description);
				$id_last=$this->ad->lastInsertId();
				echo $id_last."<br>";
				if($add_pro){
					echo "Thanh cong";
				}else{
					echo "Loi!";
				}
				//  $uploadPath = "../images/product/".$name_product.'_'.time();
				//  if (!is_dir($uploadPath)) {
    //     			mkdir($uploadPath, 0777, true);
    // 			}
    // 			$uploadPath_real=substr($uploadPath,3);
    		
    // 			foreach ($files as $key => $value) {
    // 				move_uploaded_file($value['tmp_name'],$uploadPath.'/'.time().'_'.$value['name']);
    // 				$add_list=$this->ad->add_List_img($id_last,$uploadPath_real.'/'.time().'_'.$value['name']);

    // 			}
    			
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