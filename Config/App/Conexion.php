<?php 
	class Conexion {
		//Tiene una propiedad privada llamada "$conect" para contener el objeto de conexión de la base de datos.
		private $conect;

		public function __CONSTRUCT(){
			//Indicamos la conexión
			//Se construye una cadena de conexión PDO utilizando los valores de las constantes "host", "db" y "charset" (presumiblemente definidas en otro lugar).
			$pdo = "mysql:host=" . host . ";dbname=" .db. ";" .charset. ;


			//Capturamos las excepciones
			try {
				//Se crea un nuevo objeto PDO y se asigna a la propiedad "$conect".
				$this->conect = new PDO($pdo, user, pass);

				//Indicamos el atributo para capturar las excepciones
				//Se llama al método "setAttribute" en el objeto PDO para establecer el modo de error en "PDO::ERRMODE_EXCEPTION", lo que significa que PDO generará excepciones por errores.
				$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			  //Si se produce una excepción durante el proceso de conexión, se detecta una "PDOException" y se repite un mensaje de error.
			} catch (PDOException $e) {
				echo "Error en la conexión" . $e->getMessage();
			}
		} //Fin de __CONSTRUCT


		//El método "conect" se define para recuperar la propiedad "$conect", que contiene el objeto de conexión PDO.
		public function conect() {
			return $this->conect;
		}


	}



 ?>