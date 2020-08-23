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

		//Lấy danh sách tất cả sản phẩm HOT
		public function getProduct_Hot(){
			$sql="SELECT * FROM tbl_product WHERE stt=1 ORDER BY id_product DESC";
			$pre=$this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}
		//Lấy ra danh sách sản phẩm HOT kèm phân trang
		public function getProduct_Hot_limit($form,$row){
			$sql="SELECT * FROM tbl_product WHERE stt=1 ORDER BY id_product DESC LIMIT $form,$row";
			$pre=$this->pdo->query($sql);
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}


		//Lấy ra tất cả sản phẩm của 1 hãng
		public function getProduct($id_brand){
			
			$sql="SELECT * FROM tbl_product WHERE id_brand=:id_brand ORDER BY id_product DESC";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id_brand',$id_brand);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy ra tất cả sản phẩm của 1 hãng -dành cho SS
		public function getProduct_SS($id_brand){
			
			$sql="SELECT * FROM tbl_product WHERE id_brand=:id_brand ORDER BY id_product DESC";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id_brand',$id_brand);
			$pre->execute();
			return $pre->fetch(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách sản phẩm của 1 hãng kèm theo tên hãng(giới hạn phân trang)
		public function Product_limit($form,$row,$id_brand){
			
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=$id_brand ORDER BY id_product DESC LIMIT $form,$row";
			$pre=$this->pdo->query($sql);		
			return $pre->fetchAll(PDO::FETCH_ASSOC);

		}

		//Lấy danh sách tất cả sản phẩm tùy chọn theo ID Hãng và ID Type. 
		public function ProductOption($id_brand,$id_type){

			$sql="SELECT * From tbl_product WHERE id_brand=:id_brand AND id_type=:id_type ORDER BY id_product DESC";
			$pre=$this->pdo->prepare($sql);	
			$pre->bindParam(':id_brand',$id_brand);
			$pre->bindParam(':id_type',$id_type);
			$pre->execute();	
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}	



		//Lấy danh sách sản phẩm tùy chọn theo tùy chọn theo ID Hãng và ID Type.. Kèm theo tên hãng,tên loại (giới hạn phân trang)
		public function ProductOption_limit($form,$row,$id_brand,$id_type){

			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND tbl_product.id_brand=$id_brand AND tbl_product.id_type=$id_type ORDER BY id_product DESC LIMIT $form,$row";
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
		//Lấy ra 3 sản phẩm liên quan,cùng hãng nhưng khác ID
		public function getProduct_related($id_product,$id_brand){
			$sql="SELECT * FROM tbl_product WHERE id_product!=$id_product AND id_brand=$id_brand ORDER BY RAND() LIMIT 3";
			$pre=$this->pdo->query($sql);
			return $pre->fetchAll(PDO::FETCH_ASSOC);
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