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
//Lấy hàm get_listImg() cho Ajax
	public function get_listImg($id){
		return $this->ad->get_listImg($id);
	}

//Lấy hàm getProduct_ID($id) cho Ajax
	public function getProduct_ID($id){
		return $this->ad->getProduct_ID($id);
	}
//Lấy hàm getBrand(), và getType() cho Ajax
	public function getBrand(){
		return $this->ad->getBrand();
	}
	public function getType(){
		return $this->ad->getType();
	}
//lấy hàm ChangeArrayFile($arr,$files) cho ajax
	public function ChangeArrayFile($arr,$files){
		return $this->ad->ChangeArrayFile($arr,$files);
	}
//Lấy hàm del_Img_inList($id,$src) cho ajax
	public function del_Img_inList($id,$src){
		return $this->ad->del_Img_inList($id,$src);
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
			
			if(isset($_POST['search_product'])){
				$_SESSION['key_product']='%'.$_POST['key_product'].'%';
			}

			if(!isset($_SESSION['key_product'])){
				$rs=$this->ad->get_Product(false);
				$row=10;
				$number=count($rs);
				$pagination=ceil($number/$row);
				if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
					$pages=(int)$_GET['pages'];
				}else{
					$pages=1;
					$_GET['pages']=1;
				}
				$form=($pages-1)*$row;
				$rs=$this->ad->get_Product_limit($form,$row,false);
				$rs=$this->ad->add_discount($rs);
			}
			else{
				$rs=$this->ad->get_Product($_SESSION['key_product']);
				$row=5;
				$number=count($rs);	
				$pagination=ceil($number/$row);
				if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
					$pages=(int)$_GET['pages'];
				}else{
					$pages=1;
					$_GET['pages']=1;
				}
				$form=($pages-1)*$row;
				$rs=$this->ad->get_Product_limit($form,$row,$_SESSION['key_product']);
				$rs=$this->ad->add_discount($rs);
			}
			// echo "<pre>";
			// print_r($rs);
			// echo "</pre>";

//Thêm mới sản phẩm
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
    				$_SESSION['noti_addPro']=1;
    				
    			}else{
    				$_SESSION['noti_addPro']=2;
    			}


    			
    		}




    		include_once "views/product.php";
    		break;

    		case 'edit-product':
    		$id_max=$this->ad->getMaxId_Product();
			// 		echo "<pre>";
			// print_r($rs);
			// echo "</pre><hr>";
			// $id_max['MAX(id_product)']; là giá trị ID lớn nhất trong bảng product
    		if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id'] <= $id_max['MAX(id_product)']){
    			$id=(int)$_GET['id'];
    		}
    		else{
    			header("Location:index.php");
    		}
    		$rs=$this->ad->getProduct_ID($id);
    		$rs=$this->ad->add_discount($rs);
			// echo "<pre>";
			// print_r($rs);
			// echo "</pre><hr>";
    		$rs_brand=$this->ad->getBrand();
    		$rs_type=$this->ad->getType();
    		$rs_listimg=$this->ad->get_listImg($id);

    		if(isset($_POST['edit_product'])){
    			$img=$_FILES['imgR'];
    			$list_img=$_FILES['list_imgR'];
    			$name_product=$_POST['name_productR'];
    			$id_brand=$_POST['brand'];
    			$id_type=$_POST['type'];
    			$price=$_POST['priceR'];
    			$discount=$_POST['discountR'];
    			$quantity=$_POST['quantityR'];
    			$description=$_POST['descriptionR'];

    			$files=array();
    			$files=$this->ad->ChangeArrayFile($list_img,$files);

    			$update=$this->ad->Update_Product($id,$name_product,$id_brand,$id_type,$price,$discount,$quantity,$description);
    			if($update){
			// echo "<pre>";
			// print_r($img);
			// echo "</pre><hr>";
			// echo "<pre>";
			// print_r($files);
			// echo "</pre><hr>";
    				if(!empty($img['name']) && !empty($img['type']) && !empty($img['size']) && !empty($img['tmp_name'])){
    					$create_path="images/product/".$id."/".time().'_avatar_'.$img['name'];
    					move_uploaded_file($img['tmp_name'],"../".$create_path);
    					if(file_exists($_SESSION['memory_avt'])){
    						unlink($_SESSION['memory_avt']);
    					}
    					
    					$update_img=$this->ad->addImg_Product($create_path,$id);
    					
    				}
    				if(!empty($files[0]['name']) && !empty($files[0]['type']) && !empty($files[0]['size'])){
    					foreach ($files as $key => $value) {
    					$create_path="images/product/".$id."/".time().'_'.$value['name'];
    						move_uploaded_file($value['tmp_name'],"../".$create_path);
    						$add_list=$this->ad->add_List_img($id,$create_path);
    					}
    				}
    				// header("Location:index.php?page=home&views=edit-product&id=".$id);
    			echo "<script>alert(' Sửa thành công !');
    			window.location.href = 'index.php?page=home&views=edit-product&id=".$id."';</script>";

    			}else{
    			echo "<script>alert(' Có lỗi trong quá trình sửa!');</script>";	
    			}	
    		}

    		include_once "views/edit-product.php";
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