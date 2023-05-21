<?php 
	
	class Views {

		public function getView($ruta, $vista, $data="") {
			//Obtenemos el nombre de la clase
			//$controlador = get_class($controlador);

			//Verificamos si el controlador es igual a Home
			if ($ruta == "Home") {
				//Indicamos a que vista va a acceder
				$vista = "Views/" . $vista . ".php";
			} else {
				$vista = "Views/" . $ruta . "/" . $vista . ".php";
			}

			//Requerimos esa vista
			require $vista;
		}
	}

 ?>