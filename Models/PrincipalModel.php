<?php 
	class PrincipalModel extends Query {

		public function __CONSTRUCT() {
			parent::__CONSTRUCT();
		}

		//Obtener datos del producto seleccionado
		public function getProducto($id_producto) {
			$sql = "SELECT p.*, c.categoria FROM productos p 
						INNER JOIN 
					categorias c ON p.id_categoria = c.id_categoria
						WHERE 
					p.id_producto = $id_producto";
			
			return $this->select($sql);
		}

		//Obtener todos los productos
		public function getProductos($desde, $porPagina) {
			$sql = "SELECT * FROM productos LIMIT $desde, $porPagina";
			return $this->selectAll($sql);
		}


		//Obtener el total de productos
		public function getTotalProductos() {
			$sql = "SELECT COUNT(*) AS Total FROM productos";
			return $this->select($sql);
		}


		//Productos relacionados con la categoría
		public function getProductosCat($id_categoria, $desde, $porPagina) {
			$sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria LIMIT $desde, $porPagina";
			return $this->selectAll($sql);
		}


		//Obtenemos el total de productos por categoría
		public function getTotalProductosCat($id_categoria) {
			$sql = "SELECT COUNT(*) AS Total FROM productos WHERE id_categoria = $id_categoria";
			return $this->select($sql);
		}


		//Obtener otros productos relacionados aleatorios
		public function getAleatorios($id_categoria, $id_producto) {
			//La función RAND() genera un número aleatorio para cada fila y luego las filas se ordenan en función de esos números aleatorios.
			$sql = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id_producto != $id_producto ORDER BY RAND() LIMIT 20";
			return $this->selectAll($sql);

		}


		
	}


 ?>