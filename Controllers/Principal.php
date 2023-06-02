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
			$porPagina = 2;
			//Hacemos el calculo
			$desde = ($pagina - 1) * $porPagina;

			//Una vez hecho los calculos pasamos los parametros
			$data['productos'] = $this->model->getProductos($desde, $porPagina);
			$data['pagina'] = $pagina;

			//Llamamos al metodo getTotalProductos()
			$total = $this->model->getTotalProductos();

			//Calculamos el total por página
			$data['total'] = ceil($total['Total'] / $porPagina);

			$data['title'] = 'Nuestros Productos';
			//Llamamos a la vista del archivo shop.php(Tienda)
			$this->views->getView('principal', "shop", $data);
		}


		//Vista detail
		public function detail($id_producto) {
			$data['producto'] = $this->model->getProducto($id_producto);
			$id_categoria = $data['producto']['id_categoria'];
			$data['relacionados'] = $this->model->getAleatorios($id_categoria, $data['producto']['id_producto']);
			//Mostramos el nombre del producto seleccionado
			$data['title'] = $data['producto']['nombre'];
			$this->views->getView('principal', "shop-single", $data);
		}


		//Vista categorias
		public function categorias($datos) {
			$id_categoria = 1;
			$page = 1;

			//Convertimos $datos en un array
			//Vamos a convertir separando desde una ','
			$array = explode(',', $datos);
			if (isset($array[0])) {
				if (!empty($array[0])) {
					$id_categoria = $array[0];
				}
			}

			if (isset($array[1])) {
				if (!empty($array[1])) {
					$page = $array[1];
				}
			}
			//Agregamos un paginador
			$pagina = (empty($page)) ? 1 : $page ;
			$porPagina = 1;
			$desde = ($pagina - 1) * $porPagina;
			$data['pagina'] = $pagina;
			$total = $this->model->getTotalProductosCat($id_categoria);
			$data['total'] = ceil($total['Total'] / $porPagina);

			$data['productos'] = $this->model->getProductosCat($id_categoria, $desde, $porPagina);
			$data['title'] = 'Categorías';
			$data['id_categoria'] = $id_categoria;
			$this->views->getView('principal', "categorias", $data);
		}


		//Vista contact
		public function contact() {
			$data['title'] = 'Contáctanos';
			$this->views->getView('principal', "contact", $data);
		}


		//Vista lista de deseos
		public function deseo() {
			$data['title'] = 'Tu lista de deseos';
			$this->views->getView('principal', "deseo", $data);
		}
	}


 ?>