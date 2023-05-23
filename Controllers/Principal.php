<?php 

	class Principal extends Controller{

		public function __CONSTRUCT() {
			parent::__CONSTRUCT();
			session_start();
		}

		public function index() {
			
		}


		//Vista About
		public function about() {
			$data['title'] = 'Servicios';
			$this->views->getView('principal', "about", $data);
		}


		//Vista Shop
		public function shop() {
			$data['title'] = "Nuestros Productos";
			$this->views->getView('principal', "shop", $data);
		}
	}


 ?>