<?php 
	
	class HomeModel extends Query{

		public function __CONSTRUCT() {
			
			parent::__CONSTRUCT();
	  }


	  	//Listar categorías
		public function getCategorias() {
			$sql = "SELECT * FROM categorias";
			return $this->selectAll($sql);
		}


		//Listar productos
		public function getNuevosProductos() {
			//Seleccionamos los productos de forma descendiente, enlistando de primero al más reciente y decimos que solo muestre 12 registros
			$sql = "SELECT * FROM productos ORDER BY id_producto DESC LIMIT 12";
			return $this->selectAll($sql);
		}
		

	}

 ?>