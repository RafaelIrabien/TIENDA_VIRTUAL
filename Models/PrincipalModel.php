<?php 
	class PrincipalModel extends Query {

		public function __CONSTRUCT() {
			parent::__CONSTRUCT();
		}


		public function getProducto($id_producto) {
			$sql = "SELECT p.*, c.categoria FROM productos p 
						INNER JOIN 
					categorias c ON p.id_categoria = c.id_categoria
						WHERE 
					p.id_producto = $id_producto";
			
			return $this->select($sql);
		}


		
	}


 ?>