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
        $this->smarty->display('./templates/home.tpl');
    }

    
      

    // function renderPage($partialPage, $productos, $categorias)
    // {
    //     if ($partialPage == 'home') {
    //         return $this->showHome($productos, $categorias);
    //     } elseif ($partialPage == 'categoria') {
    //         return $this->showCategoria($productos, $categorias);
    //     } elseif ($partialPage == 'producto') {
    //         return $this->showProducto();
    //     } else {
    //         return $this->showError();
    //     }
    // }

    function showProducto($categorias, $producto, $categoria){
        //asigno variables para mostrar
        $this->smarty->assign('tituloHome', "Conoce nuestro productos");
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('producto', $producto);
        $this->smarty->assign('categoria', $categoria);

        //mostrar template
        $this->smarty->display('./templates/producto.tpl');
    }


    function showCategoria($productos, $categorias, $categoria){
        //asigno variables para mostrar
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('productos', $productos);

        //mostrar template
        $this->smarty->display('./templates/categoria.tpl');



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

    function showError()
    {
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


    function showLogin()
    {
        $html = '<!DOCTYPE html>
            <html>
            <head>
                <title>Login Page</title>
                <!--Made with love by Mutiullah Samim -->
            
                <!--Bootsrap 4 CDN-->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            
                <!--Fontawesome CDN-->
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            
                <!--Custom styles-->
                <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
            </head>
            <body>
            <div class="container">
                <div class="d-flex justify-content-center h-100">
                    <div class="card">
                        <div class="card-header">
                            <h3>Sign In</h3>
                            <div class="d-flex justify-content-end social_icon">
                                <span><i class="fab fa-facebook-square"></i></span>
                                <span><i class="fab fa-google-plus-square"></i></span>
                                <span><i class="fab fa-twitter-square"></i></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="username">
            
                                </div>
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="password">
                                </div>
                                <div class="row align-items-center remember">
                                    <input type="checkbox">Remember Me
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn float-right login_btn">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">';
        /*  <div class="d-flex justify-content-center links">
              Don't have an account?<a href="#">Sign Up</a>
          </div> */
        $html .= '<div class="d-flex justify-content-center">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </body>
            </html>';
        echo $html;
    }

    function ShowHomeLocation($location)
    {
        header("Location: " . BASE_URL . $location);
    }


}

?>