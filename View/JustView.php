<?php

//incluir Smarty
require_once "./libs/smarty/Smarty.class.php";

class JustView{

    private $tituloPagina;
    private $smarty;

    function __construct(){
        $this->tituloPagina = "Just - Cosmetica Natural";

        // inicializo Smarty
        $this->smarty = new Smarty();

        $this->smarty->assign('tituloPagina', $this->tituloPagina);
        $this->smarty->assign('baseURL', BASE_URL);
    }

    function showHome($categorias, $productos){
        //asigno variables para mostrar
        $this->smarty->assign('tituloHome', "Conoce nuestro productos");
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('productos', $productos);

        //mostrar template
        $this->smarty->display('./templates/usuario/home.tpl');
    }


    function showProducto($categorias, $producto, $categoria){
        //asigno variables para mostrar
        $this->smarty->assign('tituloHome', "Conoce nuestro productos");
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('categoria', $categoria);

        //mostrar template
        $this->smarty->display('./templates/usuario/producto.tpl');
    }


    function showCategoria($productos, $categorias, $categoria){
        //asigno variables para mostrar
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('productos', $productos);

        //mostrar template
        $this->smarty->display('./templates/usuario/categoria.tpl');



         //FORMULARIO para agregar producto
        
        //    '<section class="form-productos" id="js-form-agregar">
        //         <h2 class="titulo-categoria" id="js-titulo-formulario">Agregar productos</h2>
        //         <form action="insert" method="post" class="formulario-agregar-producto">
        //             <input type="text" id="nombre-tabla" name="Nombre_Producto" placeholder="Nombre producto" required>
        //             <input type="text" id="descripcion-tabla" name="Descripcion" placeholder="Descripcion" required>
        //             <input type="text" id="tamaño-tabla" name="Tamano" placeholder="Tamaño" required>
        //             <input type="text" id="precio-tabla" name="Precio" placeholder="Precio" required step="any">
        //             <label for="select-categoria">Seleccione una Categoría</label><select name="eleccion" id="select-categoria">';

        // $html = $this->cargarCategorias($categorias);

        // $html .= '</select>
        //             <button id="btn-agregar-tabla" class="btn-form-productos">Agregar producto</button>
        //         </form>
  
        //     </section>
        
        // </article>
        
    }

    function showError(){
        return '<h1>No se puede mostrar la pagina</h1>';
    }

    function cargarCategorias($categorias)
    {
        $html = '';
        foreach ($categorias as $categoria) {
            $html .= '<option value="' . $categoria->nombre . '">' . $categoria->nombre . '</option>';
        }

        return $html;
    }


    function showLogin(){
        //mostrar template
        $this->smarty->display('./templates/administrador/login.tpl');
    }

    function ShowHomeLocation($location)
    {
        header("Location: " . BASE_URL . $location);
    }
}

?>