<?php 
	
	class CategoriasModel extends Query{

		public function __CONSTRUCT() {
		//Indicamos que vamos a cargar el metodo __CONSTRUCT() de la clase Query
		parent::__CONSTRUCT();
	  }


	  	public function getCategoria() {
	  		$sql = "SELECT * FROM categorias";
	  		$data = $this->select($sql);
	  		return $data;
	  	}

	}

 ?>