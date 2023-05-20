<?php 
	
	class Views {

		public function getView($controlador, $vista) {
			//Obtenemos el nombre de la clase
			$controlador = get_class($controlador);

			//Verificamos si el controlador es igual a Home
			if ($controlador == "Home") {
				//Indicamos a que vista va a acceder
				$vista = "Views/" . $vista . ".php";
			} else {
				$vista = "Views/" . $controlador . "/" . $vista . ".php";
			}

			//Requerimos esa vista
			require $vista;
		}
	}

 ?>