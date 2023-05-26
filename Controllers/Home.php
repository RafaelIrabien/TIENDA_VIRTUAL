<?php 
	
	class Home extends Controller{

		public function __CONSTRUCT() {
			parent::__CONSTRUCT();
			session_start();
		}

		public function index() {
			$data['title'] = 'Página principal';
			//Llamamos al metodo getCategorias del Modelo
			$data['categorias'] = $this->model->getCategorias();
			//Llamamos al metodo getNuevosProductos del Modelo
			$data['nuevosProductos'] = $this->model->getNuevosProductos();
			//Traemos views del archivo Config/App/Controller.php
			$this->views->getView('Home', 'index', $data);
		}

	}


 ?>