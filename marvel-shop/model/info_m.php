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

//Lấy thông tin người dùng đối chiếu qua id_user và pass
	public function getInfo_user_id_pass($id_user,$pass){
		$sql="SELECT * FROM tbl_user WHERE id_user=:id_user AND pass=:pass";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':id_user',$id_user);
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

//Sửa phone của user
	public function edit_phone($phone,$id_user){
		$sql="UPDATE tbl_user SET phone=:phone WHERE id_user=:id_user";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':phone',$phone);
		$pre->bindParam(':id_user',$id_user);
		return $pre->execute();
	}

//Sửa lại email,phone,địa chỉ của user
	public function edit_email_phone_address($email,$phone,$address,$id_user){
		$sql="UPDATE tbl_user SET email=:email,phone=:phone,address=:address WHERE id_user=:id_user";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':email',$email);
		$pre->bindParam(':phone',$phone);
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

	//Truyền thông tin khách hàng và đơn hàng vào tbl_order danh cho trường hợp chưa đăng nhập
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

	//Truyền thông tin khách hàng và đơn hàng vào tbl_order danh cho trường hợp ĐÃ ĐĂNG NHẬP
	public function get_info_Login($id_user,$name, $id_payment, $total, $phone, $email, $address, $note){
		$sql = "INSERT INTO tbl_order(id_user,name,id_payment, total,phone,email,address,note) VALUES (:id_user,:name, :id_payment, :total, :phone, :email, :address, :note)";
		$pre = $this->pdo->prepare($sql);
		$pre->bindParam('id_user', $id_user);
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

		//Lấy thông tin 1 thành viên dựa theo ID FB - tbl_user
		public function get_User_FB($id_fb){
			$sql = "SELECT * FROM tbl_user WHERE id_fb=:id_fb";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_fb', $id_fb);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		//Add thêm 1 user có chứa cả ID FB
		public function add_User_FB($id_fb,$name,$pass){
		$sql="INSERT INTO tbl_user(id_fb,name_user,pass) VALUES (:id_fb,:name,:pass)";
		$pre=$this->pdo->prepare($sql);
		$pre->bindParam(':id_fb',$id_fb);
		$pre->bindParam(':name',$name);
		$pre->bindParam(':pass',$pass);
		return $pre->execute();
	}

	//Hàm lấy ra 1 bản ghi trong bảng tbl_verification dựa theo email
	public function get_Verification_email($email){
			$sql = "SELECT * FROM tbl_verification WHERE email=:email";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

		//Tìm kiếm 1 bản ghi bảng tbl_verification dựa theo email và verification_code
		public function get_Verification_email_code($email,$verification_code){
			$sql = "SELECT * FROM tbl_verification WHERE email=:email AND verification_code=:verification_code";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email',$email);
			$pre->bindParam(':verification_code',$verification_code);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);			
		}	

	//Thêm 1 verification code vào tbl_verification
	public function add_Verification($email,$verification_code){
			$sql = "INSERT INTO tbl_verification (email,verification_code) VALUES (:email,:verification_code)";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':verification_code', $verification_code);
			return $pre->execute();
			
		}

	//Update lại 1 verification code vào tbl_verification dựa theo email
	public function update_Verification($email,$verification_code){
			$sql = "UPDATE tbl_verification SET verification_code=:verification_code WHERE email=:email";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':verification_code', $verification_code);
			return $pre->execute();
			
		}

	//Xóa 1 bản ghi bảng tbl_verification dựa theo verification_code
	public function del_Verification($verification_code){
			$sql = "DELETE FROM tbl_verification WHERE verification_code=:verification_code";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':verification_code', $verification_code);
			return $pre->execute();
			
		}
	
	//Thay đổi mật khẩu của 1 user tìm theo email
	public function update_PassUser_email($email,$pass){
			$sql = "UPDATE tbl_user SET pass=:pass WHERE email=:email";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':pass', $pass);
			return $pre->execute();
			
		}	

	//Thay đổi mật khẩu của 1 user tìm theo id_user
	public function update_PassUser_id_user($id_user,$pass){
			$sql = "UPDATE tbl_user SET pass=:pass WHERE id_user=:id_user";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':id_user', $id_user);
			$pre->bindParam(':pass', $pass);
			return $pre->execute();
			
		}

	//Thêm 1 trường contact bảng tbl_contact	
		public function add_contact($name,$email,$phone,$contact){
			$sql = "INSERT INTO tbl_contact (name,email,phone,contact) VALUES (:name,:email,:phone,:contact)";
			$pre = $this->pdo->prepare($sql);
			$pre->bindParam(':name', $name);
			$pre->bindParam(':email', $email);
			$pre->bindParam(':phone', $phone);
			$pre->bindParam(':contact', $contact);
			return $pre->execute();
			
		}

		//lấy thông tin tại bảng tbl_news
		public function get_new(){
			$sql = "SELECT * FROM tbl_news";
			$pre = $this->pdo->prepare($sql);
			$pre->execute();
			return $pre->fetchAll(PDO::FETCH_ASSOC);
		}

}
 ?>