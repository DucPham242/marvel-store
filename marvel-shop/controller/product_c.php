<?php 
if(isset($ajax_flag)){
	include_once '../../model/product_m.php';
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
	//Function xử lý với Ajax
	//Lấy hàm getProduct_Id từ file product_m.php
	public function getProduct_Id($id){
		return $this->pro->getProduct_Id($id);
	}

	//Lấy hàm add_discount từ file product_m.php
	public function add_discount($arr){
		return $this->pro->add_discount($arr);
	}

	//Lấy hàm getProduct_Id từ file product_m.php- dành cho SS
	public function getProduct_Id_SS($id){
		return $this->pro->getProduct_Id_SS($id);
	}

	//Lấy hàm add_discount từ file product_m.php - dành cho SS
	public function add_discount_SS($arr){
		return $this->pro->add_discount_SS($arr);
	}
	//Lấy hàm get_Listimg($id) từ file product_m.php
	public function get_Listimg($id){
		return $this->pro->get_Listimg($id);
	}

	






	public function Product(){
		if(isset($_GET['method'])) {
			$method = $_GET['method'];
		}else{
			$method = 'home';
		}
		switch ($method) {
			case 'home':
			$rs_banner=$this->pro->get_Banner();
			// echo "<pre>";
			// print_r($rs_banner);
			// echo "</pre>";
			$rs_hot=array();
			$get_pro_hot = $this->pro->get_product_5star_home();
			foreach ($get_pro_hot as $key => $value) {
				$get_rs = $this->pro->getProduct_Id_review($value['id_product']);
				array_push($rs_hot, $get_rs);
			}
			$rs_hot=$this->pro->add_discount($rs_hot); //Thêm trường giảm giá cho mảng
			$rs_hot=$this->pro->add_Url_name($rs_hot);//Thêm trường url_name cho mảng

			$rs_mv=$this->pro->Product_limit(0,8,1);
			$rs_mv=$this->pro->add_discount($rs_mv); //Thêm trường giảm giá cho mảng
			$rs_mv=$this->pro->add_Url_name($rs_mv);//Thêm trường url_name cho mảng

			$rs_dc=$this->pro->Product_limit(0,8,2);
			$rs_dc=$this->pro->add_discount($rs_dc); //Thêm trường giảm giá cho mảng
			$rs_dc=$this->pro->add_Url_name($rs_dc);//Thêm trường url_name cho mảng
			// echo "<pre>";
			// print_r($rs_mv);
			// echo "</pre>";
			include_once 'views/product/home.php';
			break;

			case 'product-detail':
			if(isset($_GET['id']) && $_GET['id']>0) {
				$id =(int)$_GET['id'];
			}else{
				header("Location:home");
			}

//Thiết lập sản phẩm đã xem qua
			$rs_seen=$this->pro->getProduct_Id_SS($id);	

				if (!isset($_SESSION['seen']) || empty($_SESSION['seen'])){
				$_SESSION['seen'][$id]=$rs_seen;
			}else{
				if (!array_key_exists($id, $_SESSION['seen'])) {
					$_SESSION['seen'][$id]=$rs_seen;
				}else{
					unset($_SESSION['seen'][$id]);
					$_SESSION['seen'][$id]=$rs_seen;

				}
			}
			if (isset($_SESSION['seen'])) {
				$count = count($_SESSION['seen']);
				if ($count >5) {
					foreach ($_SESSION['seen'] as $key => $value) {
						unset($_SESSION['seen'][$key]);
						break;
					}
				}
			}

			$rs=$this->pro->getProduct_Id($id);		
			$rs=$this->pro->add_discount($rs);

			// echo '<pre>';
			// print_r($rs);
			$rs_listimg=$this->pro->get_Listimg($id);


			$_SESSION['seen']=$this->pro->add_Url_name($_SESSION['seen']);
			// echo '<pre>';
			// print_r($_SESSION['seen']);
			// echo '</pre>';


			
			if(isset($_COOKIE['id_user']) && isset($_COOKIE['name_user'])){
				foreach ($rs as $key => $value) {

				}

				$info_rate = $this->pro->get_info_review($_COOKIE['id_user'], $value['id_product']);
				$check_raiting=count($info_rate);
					// echo $check_raiting;
					// echo '<pre>';
					// print_r($info_rate);
					// echo "</pre>";
				foreach ($info_rate as $key => $info) {

				}
				if (!isset($info)) {
					if (isset($_POST['rate'])) {
						$star = $_POST['star_val'];
						$rate = $this->pro->rate_product($_COOKIE['id_user'], $value['id_product'], $star);
						if ($rate) {
							$_SESSION['noti-review'] = 1;
						}else{
							$_SESSION['noti-review'] = 2;
						}
					}
				}

			}

			$get_qty_review = $this->pro->get_count_review($id);
					// echo '<pre>';
					// print_r($get_qty_review);
					// echo '</pre>';
			$count_review = count($get_qty_review);



			//Lấy ra 3 sản phẩm liên quan
			foreach ($rs as $key => $value) {
				$rs_related=$this->pro->getProduct_related($value['id_product'],$value['id_brand']);
				$rs_related=$this->pro->add_discount($rs_related);
				$rs_related=$this->pro->add_Url_name($rs_related);
				// echo "<pre>";
				// print_r($rs_related); 
			}

			include_once "views/product/product-detail.php";
			break;

			// SEARCH
			case 'search':
			if(!isset($_SESSION['key'])){
				$_SESSION['key'] ='%%';
			}
			if (isset($_POST['submit-search'])) {
				$_SESSION['key'] = '%'.$_POST['search'].'%';
			}


			$key=$_SESSION['key'];
			$rs_search = $this->pro->search($key);
			$rs_search = $this->pro->add_discount($rs_search);
			$row = 8;
			$count = count($rs_search);
			$pagination = ceil($count / $row);
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>0){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$from=($pages-1)*$row;
			$rs_search = $this->pro->search_limit($from,$row,$key);
			$rs_search = $this->pro->add_discount($rs_search);
			$rs_search=$this->pro->add_Url_name($rs_search);
			

			include_once "views/product/search.php";

			break;

			case 'cart':
			include_once "views/product/cart.php";
			break;

			case 'error':

				include_once "views/product/error.php";
				break;


			default:
			header("Location:home");
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
			$row=6;//Số sản phẩm, tin.. trên 1 trang
			$number=count($rs);//Tổng số sản phẩm,bản ghi,...
			$pagination=ceil($number/$row);//Số phân trang	
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			
			$rs=$this->pro->Product_limit($form,$row,1);
			break;

			case 'dc':
			$rs=$this->pro->getProduct(2);
			$row=6;//Số sản phẩm, tin.. trên 1 trang
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang	

			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>0){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			
			$rs=$this->pro->Product_limit($form,$row,2);

			break;

			case 'trans':
			$rs=$this->pro->getProduct(3);
			$row=6;//Số sản phẩm, tin.. trên 1 trang
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			
			$rs=$this->pro->Product_limit($form,$row,3);
			break;

			case 'hot':
			$rs=array();
			$get_pro_hot = $this->pro->get_product_5star();
				// foreach ($get_pro_hot as $key => $value) {
				// 	$get_rs = $this->pro->getProduct_Id_review($value['id_product']);
				// 	array_push($rs, $get_rs);

				// }
				// echo '<pre>';
				// 	print_r($get_pro_hot);
				// 	echo '</pre>';

			$row=9;//Số sản phẩm, tin.. trên 1 trang
			$number=count($get_pro_hot);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$limit_hot = $this->pro->get_product_5star_limit($form, $row);
			foreach ($limit_hot as $key => $value) {
				$get_rs = $this->pro->getProduct_Id_review($value['id_product']);
				array_push($rs, $get_rs);
			}
			// echo '<pre>';
			// 		print_r($rs);
			// 		echo '</pre>';
			break;

			case 'modeltoyMV':
			$rs=$this->pro->ProductOption(1,1);

			$row=6;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductOption_limit($form,$row,1,1);
			break;

			case 'modeltoyDC':
			$rs=$this->pro->ProductOption(2,1);
			$row=6;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductOption_limit($form,$row,2,1);
			break;

			case 'modeltoyTrans':
			$rs=$this->pro->ProductOption(3,1);
			$row=6;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductOption_limit($form,$row,3,1);
			break;

			case 'techMV':
			$rs=$this->pro->ProductOption(1,2);
			$row=6;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductOption_limit($form,$row,1,2);
			break;

			case 'techDC':
			$rs=$this->pro->ProductOption(2,2);
			$row=6;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductOption_limit($form,$row,2,2);
			break;

			case 'itemsMV':
			$rs=$this->pro->ProductOption(1,3);
			$row=6;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductOption_limit($form,$row,1,3);
			break;

			case 'itemsDC':
			$rs=$this->pro->ProductOption(2,3);
			$row=6;
			$number=count($rs);//Tổng số bản ghi
			$pagination=ceil($number/$row);//Số phân trang
			if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
				$pages=(int)$_GET['pages'];
			}else{
				$pages=1;
				$_GET['pages']=1;
			}
			$current = $_GET['pages'];
			$form=($pages-1)*$row;
			$rs=$this->pro->ProductOption_limit($form,$row,2,3);
			break;



			default:
			header("Location:home"); 
			break;
		}
		$rs=$this->pro->add_discount($rs);
		$rs=$this->pro->add_Url_name($rs);
		// echo '<pre>';
		// 			print_r($rs);
		// 			echo '</pre>';
		
		// array_multisort(array_column($rs, 'discount_price'), SORT_DESC, $rs);
		// 			echo '<pre>';
		// 			print_r($rs);
		// 			echo '</pre>';

		include_once 'views/product/list-product.php';


	}



	

}




?>