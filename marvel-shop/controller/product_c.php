<?php 
	include_once '../model/product_m.php';


	class Product_c extends product_m
	{
		private $pro; 

		function __construct()
		{
			$this->pro = new Product_m();
		}
	}
 ?>