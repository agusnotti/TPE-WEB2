<?php

class JustView
{

    private $title;

    function __construct()
    {
        $this->title = "Just - Cosmetica Natural";
    }

    function showPage($partialPage, $categorias, $productos = null)
    {

        $html = '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . $this->title . '</title>
            <base href="'.BASE_URL.'">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="./css/main.css">
            <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon">

        </head>
        
        <body>
            <!---------------------------------------------HEADER------------------------------>
            <header class="header">
                <div class="btn_menu">
                    <a href="#"><i class="fas fa-bars"></i></a>
                    <div><i class="fas fa-search"> </i><input type="search" placeholder="Buscar"> </div>
                </div>
                <nav class="nav">
                        <ul class="nav-items nav-izquierdo">';
                            foreach ($categorias as $categoria) {
                                $html.='<li><a href="categoria/'.$categoria->nombre.'">'.$categoria->nombre.'</a></li>';
                            }
                        $html.='</ul>
            
                        <ul class="nav-items nav-derecho">


                        <li class="input-busqueda">
                            <i class="fas fa-search"></i><input type="search" placeholder="Buscar">
                        </li>
                        <li><a href="login"><i class="fas fa-user"></a></i></li>
                    </ul>
                </nav>
            </header>
            <!---------------------------------------------FIN HEADER------------------------------>
            
            <!--------------------------------------------- CONTENT------------------------------>

            <div>';

            $html .= $this->renderPage($partialPage, $productos, $categorias);

            $html .= '</div>

            <!-----------------------------------------FOOTER-------------------------------------->
            <footer class="footer">
                <ul class="items-footer">
                    <li><i class="fab fa-instagram"></i></li>
                    <li><i class="fab fa-facebook-f"></i></li>
                    <li><i class="fab fa-twitter"></i></li>
                    <li><i class="fab fa-whatsapp"></i></li>
                </ul>
            </footer>
        
            <!-------------------------------------FIN FOOTER-------------------------------------->
        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
        </body>
        </html>';

        echo $html;
    }

    function renderPage($partialPage, $productos, $categorias)
    {
        if ($partialPage == 'home') {
            return $this->showHome($productos, $categorias);
        } elseif ($partialPage == 'categoria') {
            return $this->showCategoria($productos, $categorias);
        } elseif ($partialPage == 'producto') {
            return $this->showProducto();
        } else {
            return $this->showError();
        }
    }

    function showHome($productos, $categorias)
    {
        $html = '<!---------------------------------------------CONTENT--------------------------------->
        <div class="banner">
            <img src="./images/justrojo.png" alt="Just Logo">
        </div>
        
        <div class="container">

            <h1>ALGUN TITULITO</h1>
        
            <article class="container-imagenes">';

                foreach ($categorias as $categoria) {
                    $html.= '<a href="categoria/'.$categoria->nombre.'">
                        <h3>'.$categoria->nombre.'</h3>
                        <img src="images/'.$categoria->nombre.'.png" alt="Aromaterapia">
                    </a>';
                }
            
            $html.='</article>

            <article class="productos">
                <section class="tabla-productos">
                    <h2 class="titulo-categoria">Lista de productos</h2>                    
                    <table>
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Tamaño</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="body-tabla">';
                            $html .= $this->cargarTabla($productos);
                            $html .= '  
                        </tbody>
                    </table>                    
                </section>        
            </article>
        </div>
        
        <!-----------------------------------------FIN CONTENT--------------------------------->';

        return $html;
    }

    function showProducto()
    {
        $html = '<!---------------------------------------------CONTENT--------------------------------->
        <ul class="breadcrumb">
            <li><a href="home"><i class="fas fa-home"></i></a></li>
            <li><a href="categoria">Aromaterapia</a></li>
            <li>Aceite de Geranio</li>
        </ul>
        
        <article class="container-producto">
            <img src="images/producto.jpg" alt="Geranio">
            <div class="descripcion-producto">
                <h2>Aceite de Geranio</h2>
                <p>Posee un efecto armonizante general que ayuda a evocar sentimientos de paz y serenidad.
                    Ayuda a transitar los ciclos de la mujer, los sentimientos encontrados y esa extrema e
                    inexplicable sensibilidad que suele abatirnos en esos períodos. Los cambios de la mujer
                    dejarán de ser un estorbo y nos permitirán continuar con nuestro camino viviendo en plenitud.</p>
                <button>Agregar al carrito</button>
            </div>
        </article>
        <!-----------------------------------------FIN CONTENT--------------------------------->';

        return $html;
    }

    function showCategoria($productos, $categorias)
    {
        $html = '<!---------------------------------------------CONTENT--------------------------------->
        <ul class="breadcrumb">
            <li><a href="home"><i class="fas fa-home"></i></a></li>
            <li>Aromaterapia</li>
        </ul>
        
        <article class="container-imagenes categoria">
            <h1 class="titulo-categoria">Aromaterapia</h1>
            <a href="producto">
                <h3>Aceite de Bergamota</h3>
                <img src="images/categoria/Bergamota.png" alt="Bergamota">
            </a>
            <a href="producto">
                <h3>Aceite de Eucalipto</h3>
                <img src="images/categoria/Eucalipto.png" alt="Eucalipto">
            </a>
            <a href="producto">
                <h3>Aceite de Geranio</h3>
                <img src="images/categoria/Geranio.png" alt="Geranio">
            </a>
            <a href="producto">
                <h3>Aceite de Limon</h3>
                <img src="images/categoria/Limon.png" alt="Limon">
            </a>
            <a href="producto">
                <h3>Aceite de Lavanda</h3>
                <img src="images/categoria/Lavanda.png" alt="Lavanda">
            </a>
            <a href="producto">
                <h3>Aceite de Manzanilla</h3>
                <img src="images/categoria/Manzanilla.png" alt="Manzanilla">
            </a>
            <a href="producto">
                <h3>Aceite de Menta</h3>
                <img src="images/categoria/Menta.png" alt="Menta">
            </a>
            <a href="producto">
                <h3>Aceite de Naranja</h3>
                <img src="images/categoria/Naranja.png" alt="Naranja">
            </a>
        </article>
        
        <article class="productos">
            <section class="tabla-productos">
                <h2 class="titulo-categoria">Lista de productos</h2>                
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Tamaño</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="body-tabla">';
                    $html .= $this->cargarTabla($productos);
                    $html .= '</tbody>
                </table>
                
            </section>
        
            <section class="form-productos" id="js-form-agregar">
                <h2 class="titulo-categoria" id="js-titulo-formulario">Agregar productos</h2>
                <form action="insert" method="post" class="formulario-agregar-producto">
                    <input type="text" id="nombre-tabla" name="Nombre_Producto" placeholder="Nombre producto" required>
                    <input type="text" id="descripcion-tabla" name="Descripcion" placeholder="Descripcion" required>
                    <input type="text" id="tamaño-tabla" name="Tamano" placeholder="Tamaño" required>
                    <input type="text" id="precio-tabla" name="Precio" placeholder="Precio" required step="any">
                    <label for="select-categoria">Seleccione una Categoría</label><select name="eleccion" id="select-categoria">';

        $html .= $this->cargarCategorias($categorias);

        $html .= '</select>
                    <button id="btn-agregar-tabla" class="btn-form-productos">Agregar producto</button>
                </form>
  
            </section>
        
        </article>
        
        <!-----------------------------------------FIN CONTENT--------------------------------->
        
        <!-- <script src="../js/tabladinamica.js"></script> -->';

        return $html;
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


    function cargarTabla($productos)
    {
        $html = '';
        foreach ($productos as $producto) {
            $html .= '<tr>
                    <td>' . $producto->nombre . '</td>
                    <td>' . $producto->descripcion . '</td>
                    <td>' . $producto->tamano . ' ml</td>
                    <td>$ ' . $producto->precio . '</td>
                    <td>' . $producto->nombre_categoria . '</td>
                    <td> <a href="categoria/delete/' . $producto->id . '"><button class="btn-tabla-borrar"><i class="far fa-trash-alt"></i></button></a></td></tr>';
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