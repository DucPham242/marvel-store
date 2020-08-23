<?php 
if(isset($ajax_flag)){
	include_once '../config/config.php';
}else{
	include_once 'config/config.php';
}

class Admin_m extends Connect
{

	public function __construct(){
				parent::__construct();//Gọi hàm __contruct bên config để luôn tồn tại $pdo để kết nối tới CSDL
			}
//Lấy ra danh sách sản phẩm - dành cho trang quản lý sản phẩm
	public function get_Product($ss_search){
		if($ss_search==false){
			$sql="SELECT * FROM tbl_product ORDER BY id_product DESC";
			$pre=$this->pdo->prepare($sql);
		}else{
			$sql="SELECT * FROM tbl_product,tbl_brand,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND (tbl_product.name_product LIKE '$ss_search' OR tbl_brand.name_brand LIKE '$ss_search' OR tbl_type.name_type LIKE '$ss_search') ORDER BY tbl_product.id_product DESC";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':ss_search',$ss_search);
		}
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

//Lấy ra danh sách sản phẩm,có phân trang - dành cho trang quản lý sản phẩm
	public function get_Product_limit($form,$row,$ss_search){
		if($ss_search==false){
			$sql="SELECT * FROM tbl_product ORDER BY id_product DESC LIMIT $form,$row";
		}else{
			$sql="SELECT * FROM tbl_product,tbl_brand,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND (tbl_product.name_product LIKE '$ss_search' OR tbl_brand.name_brand LIKE '$ss_search' OR tbl_type.name_type LIKE '$ss_search') ORDER BY tbl_product.id_product DESC LIMIT $form,$row";
		}
		
		$pre=$this->pdo->query($sql);
		return $pre->fetchAll(PDO::FETCH_ASSOC);	
	}

//Thêm trường giảm giá cho mảng
		public function add_discount($arr){
			foreach ($arr as $key => $value) {
					if($value['discount']>0){
					$arr[$key]['discount_price']=$value['price']-(($value['price']*$value['discount'])/100);
				}
			}
			return $arr;
		}

//Lấy ra thông tin hãng
		public function getBrand(){
			$sql="SELECT * FROM tbl_brand";
			$pre=$this->pdo->query($sql);
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

//Lấy ra thông tin loại
		public function getType(){
			$sql="SELECT * FROM tbl_type";
			$pre=$this->pdo->query($sql);
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}


}
		?>