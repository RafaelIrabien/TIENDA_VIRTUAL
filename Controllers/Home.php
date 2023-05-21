<?php 
require_once "Config/App/Controller.php";

	class Home extends Controller{

		public function __CONSTRUCT() {
			parent::__CONSTRUCT();
			session_start();
		}

		public function index() {
			$data['title'] = 'Página principal';
			//Traemos views del archivo Config/App/Controller.php
			$this->views->getView('Home', "index", $data);
		}
	}


 ?>