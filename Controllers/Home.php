<?php 
require_once "Config/App/Controller.php";

	class Home extends Controller{

		public function index() {
			//Traemos views del archivo Config/App/Controller.php
			$this->views->getView($this, "index");
		}
	}


 ?>