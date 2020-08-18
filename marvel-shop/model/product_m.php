<?php 
	include_once '../config/config.php';

	class Product_m extends Connect 
	{
		function __construct(){
			parent::__construct(); // Gọi hàm __contruct bên config để luôn tồn tại $pdo để kết nối tới CSDL
		}
	}
	
?>