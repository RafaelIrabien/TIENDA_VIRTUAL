<?php 
	
	class Query extends Conexion {
		private $pdo, $con, $sql;

		public function __construct() {
			//Se crea una instancia de la clase Conexion y se asigna a la propiedad $pdo mediante la palabra clave $this. 
			$this->pdo = new Conexion();

			//Se llama al método conect() de la clase Conexion en $pdo para establecer una conexión con la base de datos, y la conexión resultante se asigna a la propiedad $con.
			$this->con = $this->pdo->conect();
		}


		public function select(string $sql) {
			$this->sql = $sql;
			$result = $this->con->prepare($this->sql);

			$result->execute();

			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

	}



 ?>