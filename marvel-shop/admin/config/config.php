<?php 
	
	class Connect {
		private $dns = "mysql:host=localhost;dbname=dbtest2";
		private $user = "root";
		private $pass = '';
		protected $pdo = null;

		function __construct()
		{ 
			try{
				$this->pdo = new PDO($this->dns, $this->user, $this->pass);
				$this->pdo->query("SET NAMES utf8");
			}catch(PDOException $e){
				echo $e->getMessage();
				exit;
			}

		}
	}

?>