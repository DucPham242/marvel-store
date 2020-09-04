<?php 
	if(isset($ajax_flag)){
		include_once '../../config/config.php';
	}else{
		include_once 'config/config.php';
	}
	

	class Product_m extends Connect 
	{
		public function __construct(){
			parent::__construct(); // Gọi hàm __contruct bên config để luôn tồn tại $pdo để kết nối tới CSDL
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

		// Hàm tìm kiếm sản phẩm
		public function search($key){
			$sql = "SELECT * FROM tbl_product, tbl_brand WHERE tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.name_product LIKE :key";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':key', $key);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
		//Tìm kiếm sản phẩm với pagination
		public function search_limit($from, $row,$key){
			$sql = "SELECT * FROM tbl_product, tbl_brand WHERE tbl_product.id_brand = tbl_brand.id_brand AND tbl_product.name_product LIKE '$key' LIMIT $from,$row";
			$pre = $this->pdo->query($sql);
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		//Lấy ra list ảnh của 1 sản phẩm
		public function get_Listimg($id){
			$sql = "SELECT * FROM tbl_detail_image WHERE id_product=:id";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();

			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		//Đánh gia sản phẩm
		public function rate_product($id_user, $id_product, $star){
			$sql = "INSERT INTO tbl_review(id_user, id_product, star) VALUES (:id_user, :id_product, :star)";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam('id_user', $id_user);
			$pre->bindParam('id_product', $id_product);
			$pre->bindParam('star', $star);
			$pre->execute();

			return $pre;
		}
		//Lấy ra thông tin bảng tbl_review để quản lý người dùng đánh giá
		public function get_info_review($id_user, $id_product){
			$sql = "SELECT *FROM tbl_review WHERE id_user = :id_user AND id_product = :id_product";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_user', $id_user);
			$pre->bindParam(':id_product', $id_product);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
		//Lấy ra số lượng account đánh giá của 1 sản phẩm
		public function get_count_review($id_product){
			$sql = "SELECT *FROM tbl_review WHERE id_product = :id_product";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_product', $id_product);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
		//lấy product hot tại trang detail
		public function get_product_5star(){
			$sql = "SELECT id_product,COUNT(star = 5) AS tongso5sao FROM tbl_review GROUP BY id_product ORDER BY tongso5sao DESC limit 0,30";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
		//xử lý pagination cho hot_pro
		public function get_product_5star_limit($from, $row){
			$sql = "SELECT id_product,COUNT(star = 5) AS tongso5sao FROM tbl_review GROUP BY id_product ORDER BY tongso5sao DESC limit $from,$row";
			$pre = $this->pdo->query($sql);
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
		//lấy product hot tại trang chủ
		public function get_product_5star_home(){
			$sql = "SELECT id_product,COUNT(star = 5) AS tongso5sao FROM tbl_review GROUP BY id_product ORDER BY tongso5sao DESC limit 0,8";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getProduct_Id_review($id){
			$sql="SELECT tbl_product.*,tbl_brand.name_brand,tbl_type.name_type From tbl_brand,tbl_product,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND id_product=:id";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id',$id);
			$pre->execute();
			return $rs=$pre->fetch(PDO::FETCH_ASSOC);

		}


		
	}
?>