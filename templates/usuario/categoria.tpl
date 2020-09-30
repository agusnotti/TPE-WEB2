{include file="../header.tpl"}
{include file="./nav.tpl"}
{include file="./breadcrumb.tpl"}


<div class="container">
    <article class="container-carousel">

        {include file="./carousel.tpl"}
        
    </article>

    <h1 class="titulo-categoria">{$categoria->nombre}</h1> 

</div>

<div class="container">
    {include file="../tablaProductos.tpl"}
</div>

{include file="./redesSociales.tpl"}
{include file="../footer.tpl"}
 
