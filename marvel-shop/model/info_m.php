<?php 
	if(isset($ajax_flag)){
		include_once '../config/config.php';
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




}
 ?>