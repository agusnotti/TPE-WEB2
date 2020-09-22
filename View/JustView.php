<?php

class JustView {

    private $title;

    function __construct(){
        $this->title = "Just - Cosmetica Natural";
    }

    function showPage($partialPage,$productos=null){

        $html = '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>'.$this->title.'</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
            <link rel="stylesheet" href="css/main.css">
            <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon">
            
        </head>
        
        <body>
            <!---------------------------------------------HEADER------------------------------>
            <header class="header">
                <div class="btn_menu">
                    <a href="#"><i class="fas fa-bars"></i></a>
                    <div><i class="fas fa-search"></i><input type="search" placeholder="Buscar"></div>
                </div>
                <nav class="nav">
                    <ul class="nav-items nav-izquierdo">
                        <li><a href="categoria">Aromaterapia</a></li>
                        <li><a href="categoria">Rostro</a></li>
                        <li><a href="categoria">Manos</a></li>
                        <li><a href="categoria">Cuerpo</a></li>
                        <li><a href="categoria">Labios</a></li>
                        <li><a href="categoria">Piernas</a></li>
                    </ul>
        
                    <ul class="nav-items nav-derecho">
                        <li><a href="#sobre-nosotros" class="link-sobre-nosotros">Nosotros</a></li>
                        <li><a href="#formulario-contacto" class="link-contacto">Contacto</a></li>
                        <li class="input-busqueda">
                            <i class="fas fa-search"></i><input type="search" placeholder="Buscar">
                        </li>
                    </ul>
                </nav>
            </header>
            <!---------------------------------------------FIN HEADER------------------------------>
            
            <!--------------------------------------------- CONTENT------------------------------>

            <div>';

            $html .= $this->renderPage($partialPage,$productos);

            $html.= '</div>

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


    function renderPage($partialPage,$productos){
        if($partialPage == 'home'){
            return $this->showHome();
        } elseif($partialPage == 'categoria'){
            return $this->showCategoria($productos);
        } elseif ($partialPage == 'producto'){
            return $this->showProducto();
        } else {
            return $this->showError();
        }
    }

    function showHome(){
        $html = '<!---------------------------------------------CONTENT--------------------------------->
        <div class="banner">
            <img src="./images/justrojo.png" alt="Just Logo">
        </div>
        
        <div class="btn-filtros-mobile">
            <a href="#">Filtros <i class="fas fa-sliders-h"></i></a>
        </div>
        
        <div class="container">
            <aside class="container-filtros">
                <h3>Filtrar</h3>
        
                <div class="categoria-filtros">
                    <h4>Aromaterapia</h4>
                    <ul>
                        <li><input type="checkbox">Aceites esenciales</li>
                        <li><input type="checkbox">Aroma Blends</li>
                    </ul>
                </div>
                <div class="categoria-filtros">
                    <h4>Bienestar Fisico</h4>
                    <ul>
                        <li><input type="checkbox">Uso Frecuente</li>
                        <li><input type="checkbox">Cuidados femeninos</li>
                        <li><input type="checkbox">Respiración</li>
                        <li><input type="checkbox">Relajacion muscular</li>
                    </ul>
                </div>
                <div class="categoria-filtros">
                    <h4>Bienestar Emocional</h4>
                    <ul>
                        <li><input type="checkbox">Relajacion</li>
                        <li><input type="checkbox">Concentracion</li>
                        <li><input type="checkbox">Armonia</li>
                        <li><input type="checkbox">Relajacion muscular</li>
                    </ul>
                </div>
                <div class="categoria-filtros">
                    <h4>Aroma</h4>
                    <ul>
                        <li><input type="checkbox">Malva</li>
                        <li><input type="checkbox">Lavanda</li>
                        <li><input type="checkbox">Naranja</li>
                        <li><input type="checkbox">Limon</li>
                        <li><input type="checkbox">Enebro</li>
                        <li><input type="checkbox">Tomillo</li>
                        <li><input type="checkbox">Manzanilla</li>
                    </ul>
                </div>
                <div class="categoria-filtros">
                    <h4>Precio</h4>
                    <ul>
                        <li><input type="checkbox">$0 - $500</li>
                        <li><input type="checkbox">$500 - $1000</li>
                        <li><input type="checkbox">$1000 - $1500</li>
                        <li><input type="checkbox">$1500 - $2000</li>
                    </ul>
                </div>
        
                <button class="btn-aplicar-filtros">Aplicar filtros</button>
            </aside>
        
            <article class="container-imagenes">
                <a href="categoria">
                    <h3>Aromaterapia</h3>
                    <img src="images/img_index1.png" alt="Aromaterapia">
                </a>
                <a href="categoria">
                    <h3>Cuidado de labios</h3>
                    <img src="images/img_index5.png" alt="Cuidado de labios">
                </a>
                <a href="categoria">
                    <h3>Cuidado del cabello</h3>
                    <img src="images/img_index2.png" alt="Cuidado del cabello">
                </a>
                <a href="categoria">
                    <h3>Cuidado del cuerpo</h3>
                    <img src="images/img_index3.png" alt="Cuidado del cuerpo">
                </a>
                <a href="categoria">
                    <h3>Cuidado del rostro</h3>
                    <img src="images/img_index4.png" alt="Cuidado del rostro">
                </a>
                <a href="categoria">
                    <h3>Cuidado de piernas</h3>
                    <img src="images/img_index6.png" alt="Cuidado de piernas">
                </a>
            </article>
        
            <article class="contacto">
                <section id="sobre-nosotros" class="container-empresa">
                    <div class="empresa">
                        <h2>¿Quienes somos?</h2>
                        <p>Desde sus principios, Just fue creada para liberar la excelencia de la naturaleza
                            -y sus poderes restauradores- buscando llegar a miles de personas alrededor del mundo. </p>
                        <a class="ver-mas">Leer mas <i class="far fa-plus-square"></i></a>
                        <p class="mobile-hidden" id="parrafo-adicional">Los productos Just se basan en recetas de bienestar
                            que utilizan prácticas ancestrales
                            con hierbas medicinales para atender necesidades cotidianas. En el corazón de cada una de
                            nuestras fórmulas se encuentran los poderes restauradores de plantas oriundas de los Alpes
                            Suizos con potentes componentes activos que brindan propiedades de bienestar y belleza
                            extraordinarias. Mediante técnicas avanzadas de investigación y desarrollo, Just se vale
                            de la ciencia y la innovación para la creación de sus productos a base de aceites esenciales
                            y extractos de plantas naturales.</p>
                        <a class="ver-menos mobile-hidden">Leer menos <i class="far fa-minus-square"></i></a>
                    </div>
                </section>
                <section class="container-formulario">
                    <h2>Contáctenos</h2>
                    <p>Para realizar una consulta, adquirir u obtener información acerca de nuestros productos completa
                        este formulario y un/a representante se contactará a la brevedad. Gracias!</p>
        
                    <form id="formulario-contacto">
                        <div class="formulario">
                            <input type="text" name="nombre" placeholder="Nombre" id="nombreformulario" required>
                            <input type="text" name="apellido" placeholder="Apellido" id="apellidoformulario" required>
                        </div>
                        <div class="formulario">
                            <input type="text" name="codArea" placeholder="Cod. Área" id="codAreaformulario">
                            <input type="text" name="telefono" placeholder="Teléfono" id="telefonoformulario" required>
                        </div>
                        <div class="formulario">
                            <input type="text" class="correo-formulario" name="correo" placeholder="Email" id="correoformulario"
                                required>
                        </div>
                        <div class="formulario">
                            <textarea name="textarea" id="mensajeformulario" rows="" cols="20"
                                placeholder="Dejenos su mensaje"></textarea>
                        </div>
                        <div class="formulario">
                            <p>Ingrese el siguiente número:</p>
                        </div>
                        <div class="captcha">
                            <h1 id="captcha-codigo"></h1>
                            <input type="number" name="captcha" id="input-captcha" required>
                            <input type="submit" input id="boton-formulario" class="boton-formulario" value="Enviar" />
                        </div>
        
                        <div class="validacion-captcha" id="mensajeCaptcha">
                            <p id="captcha-mensaje"></p>
                        </div>
                    </form>
                </section>
            </article>
        </div>
        
        <!-----------------------------------------FIN CONTENT--------------------------------->';

        return $html;
    }

    function showProducto(){
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

    function showCategoria($productos){
        $html= '<!---------------------------------------------CONTENT--------------------------------->
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
                <label for="js-input-filter">Filtrar</label><input id="js-input-filter" type="text" placeholder="">
                
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Tamaño</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="body-tabla">';
                      $html.= $this->cargarTabla($productos);
                  $html.='  </tbody>
                </table>
                <p class="ofertas">* Los articulos resaltados con <span class="intermitente"> este color</span> son las ofertas semanales.</p>
                
            </section>
        
            <section class="form-productos" id="js-form-agregar">
                <h2 class="titulo-categoria" id="js-titulo-formulario">Agregar productos</h2>
                <form action="insert" method="post" class="formulario-agregar-producto">
                    <input type="text" id="nombre-tabla" name="Nombre_Producto" placeholder="Nombre producto" required>
                    <input type="text" id="descripcion-tabla" name="Descripcion" placeholder="Descripcion" required>
                    <input type="text" id="tamaño-tabla" name="Tamano" placeholder="Tamaño" required>
                    <input type="text" id="precio-tabla" name="Precio" placeholder="Precio" required step="any">
                    <label for="select-categoria">Seleccione una Categoría</label>
                    <select name="eleccion" id="select-categoria">
                       <option value="Aromaterapia">Aromaterapia</option> 
                        <option value="Rostro">Rostro</option>
                         <option value="Manos">Manos</option>
                         <option value="Cuerpo">Cuerpo</option>                         
                         <option value="Labios">Labios</option>
                         <option value="Piernas">Piernas</option>
                    </select>
                    <button id="btn-agregar-tabla" class="btn-form-productos">Agregar producto</button>
                </form>
  
            </section>
        
        </article>
        
        <!-----------------------------------------FIN CONTENT--------------------------------->
        
        <!-- <script src="../js/tabladinamica.js"></script> -->';

        return $html;
    }

    function showError(){
        return '<h1>No se puede mostrar la pagina</h1>';
    }



    function cargarTabla($productos){
        $html='';
        foreach($productos as $producto){
            $html.='<tr>
                    <td>'.$producto->nombre.'</td>
                    <td>'.$producto->descripcion.'</td>
                    <td>'.$producto->tamano.' ml</td>
                    <td>$ '.$producto->precio.'</td>
                    <td><a href="categoria/delete/'.$producto->id.'">Borrar</a></button></td></tr>';
        }
        return $html;
    }

    function ShowHomeLocation($location){
        header("Location: ".BASE_URL.$location);
    }

    



}

?>