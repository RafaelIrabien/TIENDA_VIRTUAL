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
		

	}

 ?>