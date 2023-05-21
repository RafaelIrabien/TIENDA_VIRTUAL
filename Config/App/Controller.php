<?php 
	
	class Controller {

	protected $views, $model;

		public function __CONSTRUCT() {
			$this->views = new Views();

			//Llamamos al método cargarModel
			$this->cargarModel();
		}


		//Función para cargar el modelo
		public function cargarModel() {
			//Obtenemos el nombre de la clase de cada controlador
			$model = get_class($this) . "Model";
			$ruta = "Models/" . $model . ".php";

			//Si existe el archivo vamos a requerirlo
			if (file_exists($ruta)) {
				require_once $ruta;
				$this->model = new $model();


			}
		}


		
	}

 ?>