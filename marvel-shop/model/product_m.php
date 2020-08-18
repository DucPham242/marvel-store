<?php 
	if(isset($ajax_flag)){
		include_once '../config/config.php';
	}else{
		include_once 'config/config.php';
	}
	

	class Product_m extends Connect 
	{
		public function __construct(){
			parent::__construct(); // Gọi hàm __contruct bên config để luôn tồn tại $pdo để kết nối tới CSDL
		}

		//Lấy danh sách sản phẩm HOT
		public function getProduct_Hot(){
			$sql="SELECT * FROM tbl_product WHERE stt=1";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}
		//Lấy danh sách sản phẩm của hãng Marvel
		public function getProduct_MV(){
			$sql="SELECT * FROM tbl_product WHERE id_brand=1";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm của hãng DC
		public function getProduct_DC(){
			$sql="SELECT * FROM tbl_product WHERE id_brand=2";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm mô hình của hãng Marvel
		public function modeltoy_MV(){
			$sql="SELECT * FROM tbl_product WHERE id_brand=1 AND id_type=1";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm mô hình của hãng DC
		public function modeltoy_DC(){
			$sql="SELECT * FROM tbl_product WHERE id_brand=2 AND id_type=1";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
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

		//Tìm sản phẩm dựa theo ID
		public function getProduct_Id($id){
			$sql="SELECT * FROM tbl_product WHERE id_product=:id";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id',$id);
			$pre->execute();
			return $rs=$pre->fetchAll(PDO::FETCH_ASSOC);

		}
	}
	


	
?>