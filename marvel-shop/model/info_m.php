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
		
		

		
	}








 ?>