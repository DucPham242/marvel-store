<?php 
if(isset($ajax_flag)){
	include_once '../../config/config.php';
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

//Hàm xử lý dành cho mảng $_FILES có nhiều ảnh (Tham số $files truyền vào là 1 mảng rỗng)
		public function ChangeArrayFile($arr,$files){
			foreach ($arr as $key => $values) {
					foreach ($values as $index => $value) {
						$files[$index][$key]=$value;
					}
				}
				return $files;
		}

//Thêm sản phẩm( chưa thêm img)
		public function addProduct($name_product,$id_brand,$id_type,$price,$discount,$quantity,$description){
			$sql="INSERT INTO tbl_product(name_product,id_brand,id_type,price,discount,quantity,description) VALUES (:name_product,:id_brand,:id_type,:price,:discount,:quantity,:description)";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':name_product',$name_product);
			$pre->bindParam(':id_brand',$id_brand);
			$pre->bindParam(':id_type',$id_type);
			$pre->bindParam(':price',$price);
			$pre->bindParam(':discount',$discount);
			$pre->bindParam(':quantity',$quantity);
			$pre->bindParam(':description',$description);
			$pre->execute();
			return $pre;
		}

//Update lại thông tin của 1 sản phẩm( chưa update trường img)
		public function Update_Product($id_product,$name_product,$id_brand,$id_type,$price,$discount,$quantity,$description){
			$sql="UPDATE tbl_product SET name_product=:name_product,id_brand=:id_brand,id_type=:id_type,price=:price,discount=:discount,quantity=:quantity,description=:description WHERE id_product=:id_product";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id_product',$id_product);
			$pre->bindParam(':name_product',$name_product);
			$pre->bindParam(':id_brand',$id_brand);
			$pre->bindParam(':id_type',$id_type);
			$pre->bindParam(':price',$price);
			$pre->bindParam(':discount',$discount);
			$pre->bindParam(':quantity',$quantity);
			$pre->bindParam(':description',$description);
			$pre->execute();
			return $pre;

		}


//Update trường img cho sản phẩm tại bảng Product
		public function addImg_Product($img,$id_product){
			$sql="UPDATE tbl_product SET img=:img WHERE id_product=:id_product";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':img',$img);
			$pre->bindParam(':id_product',$id_product);
			$pre->execute();
			return $pre;

		}

//Hàm lấy ra trường ID cuối cùng vừa insert vào database
		public function lastInsertId(){
			return $id_insert=$this->pdo->lastInsertId();
		}

//Hàm thêm list ảnh vào tbl_detail_image
		public function add_List_img($id_product,$path){
			$sql="INSERT INTO tbl_detail_image(id_product,path) VALUES (:id_product,:path)";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id_product',$id_product);
			$pre->bindParam(':path',$path);
			return $pre->execute();
		}

//Hàm xóa sản phẩm
		public function del_Product($id_product){
			$sql="DELETE FROM tbl_product WHERE id_product=:id_product";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id_product',$id_product);
			$pre->execute();
			return $pre;
		}

//Hàm lấy ra tất cả thông tin 1 sản phẩm trong bảng tbl_detail_image 
		public function get_listImg($id){
			$sql="SELECT * FROM tbl_detail_image WHERE id_product=:id";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id',$id);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

//Hàm lấy 1 sản phẩm bảng tbl_product
		public function getProduct_ID($id){
			$sql="SELECT * FROM tbl_product WHERE id_product=:id";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id',$id);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

//Lấy ra ID lớn nhất trong bảng tbl_product
		public function getMaxId_Product(){
			$sql="SELECT MAX(id_product) FROM tbl_product";
			$pre=$this->pdo->query($sql);
			return $pre->fetch(PDO::FETCH_ASSOC);
		}

//Xóa 1 ảnh trong bảng tbl_detail_image
		public function del_Img_inList($id,$src){
			$sql="DELETE FROM tbl_detail_image WHERE id_product=:id AND path=:src";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id',$id);
			$pre->bindParam(':src',$src);
			$pre->execute();
			return $pre;
			
		}
//Lấy thông tin 1 admin khi đăng nhập( dựa vào email,pass)
		public function getAdmin_email($email,$pass){
			$sql="SELECT * FROM tbl_admin WHERE email=:email AND password=:pass";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':email',$email);
			$pre->bindParam(':pass',$pass);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}
}
		?>