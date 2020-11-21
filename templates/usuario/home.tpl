{include file="../header.tpl"}
{include file="./nav.tpl"}
<!---------------------------------------------CONTENT--------------------------------->
{include file="../banner.tpl"}

<div class="container">

    <h1>{$tituloHome}</h1>

    <article class="container-imagenes">
        
            {foreach from=$categorias item=categoria}

                <a href="categoria/{$categoria->nombre}">
                    <h3>{$categoria->nombre}</h3>
                    <img src="{$categoria->imagen}" alt="Aromaterapia">
                </a> 
            {/foreach}      

    </article>

    {include file="../tablaProductos.tpl"}

</div>

<!--------------------------------------------- FIN CONTENT------------------------------>
{include file="./redesSociales.tpl"}
{include file="../footer.tpl"}