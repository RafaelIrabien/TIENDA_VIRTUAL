<?php 
	
	class Errors extends Controller {

		public function __CONSTRUCT() {
			parent::__CONSTRUCT();
		}


		public function index() {
			$this->views->getView('errors', "index");
		}
	}



 ?>