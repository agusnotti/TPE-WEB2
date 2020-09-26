{include file="header.tpl"}

<!---------------------------------------------CONTENT--------------------------------->
<div class="banner">
    <img src="./images/justrojo.png" alt="Just Logo">
</div>

<div class="container">

    <h1>{$tituloHome}</h1>

    <article class="container-imagenes">
        
            {foreach from=$categorias item=categoria}

                <a href="categoria/{$categoria->nombre}">
                    <h3>{$categoria->nombre}</h3>
                    <img src="images/{$categoria->nombre}.png" alt="Aromaterapia">
                </a> 
            {/foreach}      

    </article>

    {include file="tablaProductos.tpl"}

    
</div>

<!-----------------------------------------FIN CONTENT--------------------------------->

<!--------------------------------------------- FIN CONTENT------------------------------>

{include file="footer.tpl"}