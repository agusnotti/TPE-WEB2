<?php


class CategoriaController extends Controller
{
    private $loginController;
    function __construct()
    {
        $this->loginController= new LoginController();
        parent::__construct();
    }

    /**
     * Obtiene los datos necesarios para visualizar la tabla de productos por categoria
     */
    function Categoria($params = null)
    {
        if (isset($params[':nombreCategoria'])) {
            $nombre = $params[':nombreCategoria'];
            $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);

            if ($categoria && isset($categoria->id)) {
                $paginaActual = (!empty($params) && isset($params[':pagina'])) ? $params[':pagina'] : 1;
                $productosPorPagina = 5;
                $cantidadProductosDB = $this->productoModel->countProductos($categoria->id);
                $cantidadPaginas = ceil($cantidadProductosDB / $productosPorPagina);
                $productoInicial = ($paginaActual - 1) * $productosPorPagina;

                $productos = $this->productoModel->getProductosByCategoria($nombre, $productoInicial, $productosPorPagina);
                $categorias = $this->categoriaModel->getCategorias();
                $isUserLogged = $this->loginController->isLogged();
                $isAdmin = $this->loginController->isAdmin();
                $url = 'categoria/' . $nombre . '/';
                $this->categoriaView->showCategoria($productos, $categorias, $categoria, $isUserLogged, $isAdmin, $cantidadPaginas, $paginaActual, $url);

            } else {
                $this->view->ShowLocation('home');
            }
        } else {
            $this->view->ShowLocation('home');
        }
        }

        /**
         * crea un nuevo categoria en base a datos ingresados por formulario
         */
        function InsertCategoria()
        {
            if (isset($_POST['nombre_categoria'])) {
                $nombre = $_POST['nombre_categoria'];
                $categoria = $this->categoriaModel->getCategoriaByNombre($nombre);
                if (!$categoria) {
                    if ($_FILES['img-categoria']['type'] == "image/jpg" || $_FILES['img-categoria']['type'] == "image/jpeg" || $_FILES['img-categoria']['type'] == "image/png") {
                        $this->categoriaModel->insertCategoria($nombre, $_FILES['img-categoria']['tmp_name']);
                    } else {
                        $this->categoriaModel->insertCategoria($nombre);
                    }
                }
            }

              $this->view->ShowLocation('administrador/categorias');
        }

        /**
         * Elimina un categoria
         */
        function DeleteCategoria($id_categoria = null)
        {
            if (isset($id_categoria[':ID'])) {
                $id = $id_categoria[':ID'];
                $this->categoriaModel->deleteCategoria($id);
            }
             $this->view->ShowLocation('administrador/categorias');
        }

        /**
         * modifica un categoria
         */
        function UpdateCategoria($id_categoria = null)
        {
            $id = $id_categoria[':ID'];
            $nombre = $_POST['nombre_categoria'];
            if ($_FILES['img-categoria']['type'] == "image/jpg" || $_FILES['img-categoria']['type'] == "image/jpeg" || $_FILES['img-categoria']['type'] == "image/png") {
                $this->categoriaModel->updateCategoria($id, $nombre, $_FILES['img-categoria']['tmp_name']);
                 $this->view->ShowLocation('administrador/categorias');
            } else {
                $this->categoriaModel->updateCategoria($id, $nombre);
                  $this->view->ShowLocation('administrador/categorias');
            }
        }
    }

