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
		//Lấy ra tất cả sản phẩm hãng MV
		public function getProduct_MV(){
			
			$sql="SELECT * FROM tbl_product WHERE id_brand=1";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm của hãng MV kèm theo tên hãng,tên loại (giới hạn phân trang)
		public function ProductMV_limit($form,$row){
			
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=1 LIMIT $form,$row";
			$pre=$this->pdo->query($sql);			
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm của hãng DC
		public function getProduct_DC(){
			// $sql="SELECT * FROM tbl_product WHERE id_brand=2";
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=2";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		//Lấy danh sách sản phẩm của hãng Trans
		public function getProduct_Trans(){
			// $sql="SELECT * FROM tbl_product WHERE id_brand=3";
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=3";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		//Lấy danh sách sản phẩm mô hình của hãng Marvel
		public function modeltoy_MV(){
			// $sql="SELECT * FROM tbl_product WHERE id_brand=1 AND id_type=1";
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=1 AND tbl_product.id_type=1";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm mô hình của hãng DC
		public function modeltoy_DC(){
			// $sql="SELECT * FROM tbl_product WHERE id_brand=2 AND id_type=1";
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=2 AND tbl_product.id_type=1";

			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm mô hình của hãng Trans
		public function modeltoy_Trans(){
			// $sql="SELECT * FROM tbl_product WHERE id_brand=3 AND id_type=1";
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=3 AND tbl_product.id_type=1";

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
		// get name brand
		public function getBrand_MV(){
			$sql = "SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=1";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $rs=$pre->fetchAll(PDO::FETCH_ASSOC);
		}
	}
	


	
?>