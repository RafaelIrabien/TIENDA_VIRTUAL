<?php 

	class Categorias extends Controller{
		public function index() {
			print_r($this->model->getCategoria());
		}
	}


 ?>