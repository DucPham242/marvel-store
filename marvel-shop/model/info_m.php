<?php 
	if(isset($ajax_flag)){
		include_once '../../config/config.php';
	}else{
		include_once 'config/config.php';
	}

	class Info_m extends Connect
	{
		
		public function __construct()
		{
			parent::__construct(); // Gọi hàm __contruct bên config để luôn tồn tại $pdo để kết nối tới CSDL
		}
		
//Lấy thông tin người dùng thông qua đăng nhập(email + pass)
	public function getInfo_user_login($email,$pass){
		$sql="SELECT * FROM tbl_user WHERE email=:email AND pass=:pass";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':email',$email);
		$pre->bindParam(':pass',$pass);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

//Lấy thông tin người dùng đối chiếu thông qua COOKIE id_user
	public function getInfo_user($id){
		$sql="SELECT * FROM tbl_user WHERE id_user=:id";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':id',$id);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}


//Lấy bản ghi dựa theo email bảng tbl_user
	public function getInfo_user_as_email($email){
		$sql="SELECT * FROM tbl_user WHERE email=:email";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':email',$email);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

//Lấy bản ghi dựa theo phone bảng tbl_user
	public function getInfo_user_as_phone($phone){
		$sql="SELECT * FROM tbl_user WHERE phone=:phone";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':phone',$phone);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}
//Thêm bản ghi vào bảng tbl_user
	public function add_User($name,$phone,$email,$address,$pass){
		$sql="INSERT INTO tbl_user(name_user,phone,email,address,pass) VALUES (:name,:phone,:email,:address,:pass)";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':name',$name);
		$pre->bindParam(':phone',$phone);
		$pre->bindParam(':email',$email);
		$pre->bindParam(':address',$address);
		$pre->bindParam(':pass',$pass);
		return $pre->execute();
	}

//Lấy thông tin đơn hàng dựa theo Id_user trong bảng tbl_order, kèm tên trạng thái đơn hàng
	public function getOrder_Id($id_user){
		$sql="SELECT tbl_order.*,name_stt FROM tbl_order,tbl_detail_stt_order WHERE (tbl_order.stt=tbl_detail_stt_order.id_stt) AND id_user=:id_user";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':id_user',$id_user);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

//Lấy thông tin đơn hàng,kèm theo tên sản phẩm dựa theo id_order trong bảng tbl_detail_order
	public function getDetailOrder_Id($id_order){
		$sql="SELECT tbl_detail_order.*,tbl_product.name_product FROM tbl_detail_order,tbl_product WHERE (tbl_detail_order.id_product=tbl_product.id_product) AND id_order=:id_order";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':id_order',$id_order);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

//Sửa địa chỉ của user
	public function edit_address($address,$id_user){
		$sql="UPDATE tbl_user SET address=:address WHERE id_user=:id_user";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':address',$address);
		$pre->bindParam(':id_user',$id_user);
		return $pre->execute();
	}
//Hàm lấy thông tin ra 1 code voucher,dựa vào biến code truyền vào
	public function check_voucher($code){
		$sql="SELECT * FROM tbl_voucher_order WHERE code_voucher=:code";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':code',$code);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

	//Truyền thông tin khách hàng và đơn hàng vào tbl_order
	public function get_info($name, $id_payment, $total, $phone, $email, $address, $note){
		$sql = "INSERT INTO tbl_order(name,id_payment, total,phone,email,address,note) VALUES (:name, :id_payment, :total, :phone, :email, :address, :note)";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam('name', $name);
		$pre->bindParam('id_payment', $id_payment);
		$pre->bindParam('total', $total);
		$pre->bindParam('phone', $phone);
		$pre->bindParam('email', $email);
		$pre->bindParam('address', $address);
		$pre->bindParam('note', $note);

		$pre->execute();
		return $pre;

	}
// 
	// public function get_user($email,$phone){
	// 	$sql = "SELECT * FROM tbl_user WHERE email = :email AND phone = :phone" ;
	// 	$pre = $this->pdo->prepare($sql);
	// 	$pre->bindParam('email', $email);
	// 	$pre->bindParam('phone', $phone);
	// 	$pre->execute();
	// 	return $pre->fetchAll(PDO::FETCH_ASSOC);
	// }
	//hàm lấy ra thông tin tbl user
	// public function get_user_lg(){
	// 	$sql = "SELECT * FROM tbl_user";
	// 	$pre = $this->pdo->prepare($sql);
	// 	$pre->execute();
	// 	return $pre->fetchAll(PDO::FETCH_ASSOC);
	// }
	// thêm chi tiết đơn hàng vào bảng tbl_order khi khách hàng  không đăng nhập
	// public function create_account($name_user, $phone, $email, $pass, $address){
	// $sql = "INSERT INTO tbl_order(name_user, phone, email, pass, address) VALUES (:name_user, :phone, :email, :pass, :address)";
	// $pre = $this->pdo->prepare($sql);
	// $pre->bindParam('name_user', $name_user);
	// $pre->bindParam('phone', $phone);
	// $pre->bindParam('email', $email);
	// $pre->bindParam('pass', $pass);
	// $pre->bindParam('address', $address);

	// $pre->execute();
	// return $pre;
	// }
	//hàm xử lý lấy ra id cuối cùng
	public function lastInsertId(){
			return $id_insert=$this->pdo->lastInsertId();
		}

	// thêm chi tiết đơn hàng vòa bảng detail order
		public function add_detai_order($id_order, $id_product, $quantity, $price, $total){
			$sql = "INSERT INTO tbl_detail_order(id_order, id_product, quantity, price, total) VALUES (:id_order, :id_product, :quantity, :price, :total)";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam('id_order', $id_order);
			$pre->bindParam('id_product', $id_product);
			$pre->bindParam('quantity', $quantity);
			$pre->bindParam('price', $price);
			$pre->bindParam('total', $total);
			$pre->execute();

			return $pre;
		}
		//lấy ra tất cả thông tin đơn hàng tại bảng detail_order
		public function get_order($id){
			$sql = "SELECT * FROM tbl_order WHERE id_order = :id";
			$pre=$this->pdo->prepare($sql);
			$pre->bindParam(':id', $id);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		//trừ đi số lượng sản phẩm tại tbl_product khi khách đặt hàng
		public function del_qty_pro($qty, $id_product){
			$sql = "UPDATE tbl_product SET quantity = quantity - :qty WHERE id_product = :id_product";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':qty', $qty);
			$pre->bindParam(':id_product', $id_product);
			return $pre->execute();
		}

}
 ?>