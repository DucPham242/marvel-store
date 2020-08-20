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
		//Lấy ra tất cả sản phẩm của 1 hãng
		public function getProduct($id_brand){
			
			$sql="SELECT * FROM tbl_product WHERE id_brand=:id_brand";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id_brand',$id_brand);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy ra tất cả sản phẩm của 1 hãng -dành cho SS
		public function getProduct_SS($id_brand){
			
			$sql="SELECT * FROM tbl_product WHERE id_brand=:id_brand";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id_brand',$id_brand);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm của 1 hãng kèm theo tên hãng,tên loại (giới hạn phân trang)
		public function Product_limit($form,$row,$id_brand){
			
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=$id_brand LIMIT $form,$row";
			$pre=$this->pdo->query($sql);		
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm "Mô Hình" của 1 hãng 
		public function modeltoy($id_brand){

			$sql="SELECT * From tbl_product WHERE id_brand=:id_brand";
			$pre=$this->pdo->prepare($sql);	
			$pre->bindParam(':id_brand',$id_brand);
			$pre->execute();	
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}	



		//Lấy danh sách sản phẩm "Mô Hình" của 1 hãng  kèm theo tên hãng,tên loại (giới hạn phân trang)
		public function modeltoy_limit($form,$row,$id_brand){

			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=$id_brand AND tbl_product.id_type=1 LIMIT $form,$row";
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

		//Thêm trường giảm giá cho mảng - dành cho SESSION['cart']
		public function add_discount_SS($arr){
			foreach ($arr as $value) {
				if($arr['discount']>0){
					$arr['discount_price']=$arr['price']-(($arr['price']*$arr['discount'])/100);
				}
			}
			return $arr;
		}

		//Lấy 1 sản phẩm dựa theo ID
		public function getProduct_Id($id){
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND id_product=:id";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id',$id);
			$pre->execute();
			return $rs=$pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy 1 sản phẩm dựa theo ID dành cho SESSION['cart']
		public function getProduct_Id_SS($id){
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND id_product=:id";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id',$id);
			$pre->execute();
			return $rs=$pre->fetch(PDO::FETCH_ASSOC);

		}
		
	}
	


	
?>