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
		public function shop($page) {
			//Hacemos funcionar el paginador
			//Si no existe page por defecto será 1, de lo contrario será esa página
			$pagina = (empty($page)) ? 1 : $page ;
			//Indicamos cuantos productos por página vamos a mostrar
			$porPagina = 1;
			//Hacemos el calculo
			$desde = ($pagina - 1) * $porPagina;

			$data['title'] = 'Nuestros Productos';

			//Una vez hecho los calculos pasamos los parametros
			$data['productos'] = $this->model->getProductos($desde, $porPagina);
			$data['pagina'] = $pagina;

			//Llamamos al metodo getTotalProductos()
			$total = $this->model->getTotalProductos();

			//Calculamos el total por página
			$data['total'] = ceil($total['Total'] / $porPagina);

			//Llamamos a la vista del archivo shop.php(Tienda)
			$this->views->getView('principal', "shop", $data);
		}


		//Vista detail
		public function detail($id_producto) {
			$data['producto'] = $this->model->getProducto($id_producto);
			//Mostramos el nombre del producto seleccionado
			$data['title'] = $data['producto']['nombre'];
			$this->views->getView('principal', "shop-single", $data);
		}


		//Vista categorias
		public function categorias($id_categoria) {
			$data['productos'] = $this->model->getProductosCat($id_categoria);
			$data['title'] = 'Categorías';
			$this->views->getView('principal', "categorias", $data);
		}


		//Vista contact
		public function contact() {
			$data['title'] = 'Contáctanos';
			$this->views->getView('principal', "contact", $data);
		}
	}


 ?>