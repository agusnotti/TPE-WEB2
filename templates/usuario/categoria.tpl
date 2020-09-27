{include file="../header.tpl"}
{include file="./nav.tpl"}
{include file="./breadcrumb.tpl"}

<article class="container-carousel">
    
    {include file="./carousel.tpl"}
   <h1 class="titulo-categoria">{$categoria->nombre}</h1> 
   
</article>
<div class="container">
    {include file="../tablaProductos.tpl"}
</div>

{include file="./modal.tpl"}
{include file="./redesSociales.tpl"}
{include file="../footer.tpl"}
 
