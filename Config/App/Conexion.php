<?php 
	class Conexion {
		private $conect;

		public function __CONSTRUCT(){
			//Indicamos la conexión
			$pdo = "mysql:host=" . host . ";dbname=" .db. ";" .charset. ;

			//Capturamos las excepciones
			try {
				$this->conect = new PDO($pdo, user, pass);
				//Indicamos el atributo para capturar las excepciones
				$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $e) {
				echo "Error en la conexión" . $e->getMessage();
			}
		} //Fin de __CONSTRUCT


		public function conect() {
			return $this->conect;
		}


	}



 ?>