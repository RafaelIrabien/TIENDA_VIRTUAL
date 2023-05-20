 <?php   
    

    
	//Verifica si hay un parámetro de URL llamado "url" en la cadena de consulta de la solicitud. Si tal parámetro existe y tiene un valor no vacío, asigna ese valor a $ruta. De lo contrario, asigna el valor predeterminado de "home/índice".
	//Este código se usa a menudo para manejar el enrutamiento en una aplicación web, donde el valor del parámetro URL se usa para determinar la acción o página apropiada para mostrar.
	$ruta = !empty($_GET['url']) ? $_GET['url'] : "Home/index";
	
	//Esta línea toma la cadena $ruta y usa la función explode() para dividirla en una matriz usando el carácter "/" como delimitador. Cada segmento de la ruta se almacenará como un elemento en la matriz resultante.
	$array = explode("/", $ruta);

	//Asigna el primer elemento de $array (que representa el nombre del controlador) a la variable $controller.
	$controller = ucfirst($array[0]);
	//Inicializamos la variable $metodo con el valor predeterminado "índex".
	$metodo = "index";

	//Inicializamos la variable $parámetro con una cadena vacía.
	$parametro = "";

	//Verificamos si el segundo elemento (1) de $array no está vacío.
	if (!empty($array[1])) {
    if (!empty($array[1] != "")) {
        $metodo = $array[1];
    }
}
	


	if (!empty($array[2])) {
		if (!empty($array[2] != "")) {
			

			//Si se cumplen ambas condiciones, entra en un ciclo que comienza en el índice 2 y continúa hasta el final de la matriz (count($array)). En cada iteración del ciclo, concatena el valor en el índice actual ($array[$i]) con una coma (,) y lo agrega a la cadena $parametro.
			for ($i=2; $i < count($array); $i++) { 
				$parametro .= $array[$i]. ","; 
			}
			//Después del bucle, la coma final se elimina de la cadena $parametro mediante la función trim().
			$parametro = trim($parametro, ",");
		}
	}


	require_once "Config/App/Autoload.php";

	//Creamos una variable para almacenar la ruta de nuestra carpeta Controllers
	$dirControllers = "Controllers/".$controller.".php";

	//Verificamos si existe el controlador en ese directorio
	if (file_exists($dirControllers)) {
		//Si existe vamos a requerirlo
		require_once $dirControllers;

		$controller = new $controller();

		//Verificamos si existe un método dentro del controlador
		if (method_exists($controller, $metodo)) {
			//Si existe lo llamamos, y si tiene parametro tambien lo llamamos
			$controller->$metodo($parametro);
		} else {
			echo "No existe el método";
		}
	} else {
		echo "No existe el controlador";
	}
?>