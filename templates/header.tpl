<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$tituloPagina}</title>
    <base href="{$baseURL}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <!---------------------------------------------HEADER------------------------------>
    <header class="header">
        <div class="btn_menu">
            <a href="#"><i class="fas fa-bars"></i></a>
            <div><i class="fas fa-search"> </i><input type="search" placeholder="Buscar"> </div>
        </div>
        <nav class="nav">
            <ul class="nav-items nav-izquierdo">

                {foreach from=$categorias item=categoria}
                    <li><a href="categoria/{$categoria->nombre}">{$categoria->nombre}</a></li>
                {/foreach}

            </ul>

            <ul class="nav-items nav-derecho">
                <li class="input-busqueda">
                    <i class="fas fa-search"></i><input type="search" placeholder="Buscar">
                </li>
                <li><a href="login"><i class="fas fa-user"></a></i></li>
            </ul>
        </nav>
    </header>
    <!---------------------------------------------FIN HEADER------------------------------>