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


		//Vista shop
		public function shop() {
			$data['title'] = 'Nuestros Productos';
			$this->views->getView('principal', "shop", $data);
		}

		//Vista detail
		public function detail($id_producto) {
			$data['producto'] = $this->model->getProducto($id_producto);
			//Mostramos el nombre del producto seleccionado
			$data['title'] = $data['producto']['nombre'];
			$this->views->getView('principal', "shop-single", $data);
		}


		//Vista contact
		public function contact() {
			$data['title'] = 'Contáctanos';
			$this->views->getView('principal', "contact", $data);
		}
	}


 ?>