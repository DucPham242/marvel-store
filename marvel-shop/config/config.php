<?php 
	
	class Connect {
		private $dns = "mysql:host=localhost;dbname=";
		private $user = "root";
		private $pass = '';
		protected $pdo = null;

		function __contruct()
		{ 
			try{
				$this->pdo = new PDO($this->dns, $this->user, $this->pass);
				$this->pdo->query("SET NAME utf8");
			}catch(PDOException $e){
				echo $e->getMessage();
				exit;
			}

		}
	}

?>