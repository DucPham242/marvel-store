<?php 
if(isset($ajax_flag)){
	include_once '../model/product_m.php';
}else{
	include_once 'model/product_m.php';
}



class Product_c extends product_m
{
	private $pro; 

	function __construct()
	{
		$this->pro = new Product_m();
	}
	//Function for Ajax
	//Lấy hàm getProduct_Id từ file product_m.php
	public function getProduct_Id($id){
		return $this->pro->getProduct_Id($id);
	}

	//Lấy hàm add_discount từ file product_m.php
	public function add_discount($rs){
		return $this->pro->add_discount($rs);
	}







	public function Product(){
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method = 'home';
		}
		switch ($method) {
			case 'home':
			$rs_hot=$this->pro->getProduct_Hot();
			$rs_hot=$this->pro->add_discount($rs_hot); //Thêm trường giảm giá cho mảng
			

			$rs_mv=$this->pro->getProduct(1);
			$rs_mv=$this->pro->add_discount($rs_mv); //Thêm trường giảm giá cho mảng
			$rs_dc=$this->pro->getProduct(2);
			$rs_dc=$this->pro->add_discount($rs_dc); //Thêm trường giảm giá cho mảng
			// echo "<pre>";
			// print_r($rs_hot);
			// echo "</pre>";
			include_once 'views/home.php';
			break;

			case 'product-detail':
			if(isset($_GET['id']) && $_GET['id']>0) {
				$id =(int)$_GET['id'];
			}else{
				header("Location:index.php");
			}
			$rs=$this->pro->getProduct_Id($id);
			$rs=$this->pro->add_discount($rs);
			// echo "<pre>";
			// print_r($rs);
			// echo "</pre>";
			include_once "views/product-detail.php";
			break;

			default:
			header("Location:index.php");
			break;
		}
	}
	public function typeProduct(){
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method='marvel';
		}
		
		
		
		switch ($method) {
			case 'marvel':
			$rs=$this->pro->getProduct(1);
			$row=3;//Số sản phẩm, tin.. trên 1 trang
			$number=count($rs);//Tổng số sản phẩm,bản ghi,...
			$pagination=ceil($number/$row);//Số phân trang	
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$form=($pages-1)*$row;
			
			$rs=$this->pro->Product_limit($form,$row,1);
			break;

			case 'dc':
			$rs=$this->pro->getProduct(2);
			$row=3;//Số sản phẩm, tin.. trên 1 trang
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang	

			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>0){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$form=($pages-1)*$row;
			
			$rs=$this->pro->Product_limit($form,$row,2);
			break;

			case 'trans':
			$rs=$this->pro->getProduct(3);
			$row=3;//Số sản phẩm, tin.. trên 1 trang
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$form=($pages-1)*$row;
			
			$rs=$this->pro->Product_limit($form,$row,3);
			break;

			case 'modeltoyMV':
			$rs=$this->pro->modeltoy(1);
			$row=3;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$form=($pages-1)*$row;
			$rs=$this->pro->modeltoy_limit($form,$row,1);
			break;

			case 'modeltoyDC':
			$rs=$this->pro->modeltoy(2);
			$row=3;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$form=($pages-1)*$row;
			$rs=$this->pro->modeltoy_limit($form,$row,2);
			break;

			case 'modeltoyTrans':
			$rs=$this->pro->modeltoy(3);
			$row=3;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$form=($pages-1)*$row;
			$rs=$this->pro->modeltoy_limit($form,$row,3);
			break;

			default:
			header("Location:index.php");
			break;
		}
		$rs=$this->pro->add_discount($rs);			
		include_once 'views/list-product.php';


	}

	

}



?>