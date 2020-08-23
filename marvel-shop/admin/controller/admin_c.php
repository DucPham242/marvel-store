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
			if(isset($_POST['search_product'])){
				$_SESSION['key_product']='%'.$_POST['key_product'].'%';
			}

			if(!isset($_SESSION['key_product'])){
				$rs=$this->ad->get_Product(false);
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

			$rs_brand=$this->ad->getBrand();
			$rs_type=$this->ad->getType();
			// if(isset($_POST['add_product'])){
			// 	$list_img=$_FILES['list_img'];
			// 	echo "<pre>";
			// 	print_r($list_img);
			// 	echo "</pre>";
			// 	$files=array();
			// 	foreach ($list_img as $key => $values) {
			// 		foreach ($values as $index => $value) {
			// 			$files[$index][$key]=$value;
			// 		}
			// 	}
			// 	echo "<hr><pre>";
			// 	print_r($files);
			// 	echo "</pre>";
			// }

			


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