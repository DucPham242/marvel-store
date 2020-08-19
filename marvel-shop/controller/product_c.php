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
			

			$rs_mv=$this->pro->getProduct_MV();
			$rs_mv=$this->pro->add_discount($rs_mv); //Thêm trường giảm giá cho mảng
			$rs_dc=$this->pro->getProduct_DC();
			$rs_dc=$this->pro->add_discount($rs_dc); //Thêm trường giảm giá cho mảng
			// echo "<pre>";
			// print_r($rs_hot);
			// echo "</pre>";
			

			include_once 'views/home.php';
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
		if(isset($_GET['pages'])){
				$pages=$_GET['pages'];
			}else{
				$pages=1;
			}
		switch ($method) {
			case 'marvel':
			$rs=$this->pro->getProduct_MV();
			$row=3;//Số sản phẩm, tin.. trên 1 trang
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang	
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductMV_limit($form,$row);
			break;

			case 'dc':
			$rs=$this->pro->getProduct_DC();
			break;

			case 'trans':
			$rs=$this->pro->getProduct_Trans();
			break;

			case 'modeltoyMV':
			$rs=$this->pro->modeltoy_MV();
			break;

			case 'modeltoyDC':
			$rs=$this->pro->modeltoy_DC();
			break;

			case 'modeltoyTrans':
			$rs=$this->pro->modeltoy_Trans();
			break;

			default:
			header("Location:index.php");
			break;
		}
		$rs=$this->pro->add_discount($rs);			
		include_once 'views/show-all.php';


	}

	

}



?>