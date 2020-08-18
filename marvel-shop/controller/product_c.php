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
	public function getProduct_Id($id){
		return $this->pro->getProduct_Id($id);
	}
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
			$rs_hot=$this->pro->add_discount($rs_hot);
			

			$rs_mv=$this->pro->getProduct_MV();
			$rs_mv=$this->pro->add_discount($rs_mv);
			$rs_dc=$this->pro->getProduct_DC();
			$rs_dc=$this->pro->add_discount($rs_dc);
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

		switch ($method) {
			case 'marvel':
			$rs=$this->pro->getProduct_MV();
			$rs=$this->pro->add_discount($rs);
			include_once 'views/show-all.php';
			break;

			case 'dc':
			$rs=$this->pro->getProduct_DC();
			$rs=$this->pro->add_discount($rs);
			include_once 'views/show-all.php';
				break;
			case 'pagadigmMV':
			$rs=$this->pro->paradigm_MV();
			$rs=$this->pro->add_discount($rs);
			include_once 'views/show-all.php';
				break;
			case 'pagadigmDC':
			$rs=$this->pro->paradigm_DC();
			$rs=$this->pro->add_discount($rs);
			include_once 'views/show-all.php';
				break;

	



			default:
			header("Location:index.php");
			break;
		}


	}

	

}



?>