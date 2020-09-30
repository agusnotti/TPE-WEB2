{include file="../header.tpl"}
{include file="./nav.tpl"}
{include file="./breadcrumb.tpl"}

<div class="container">
    <article class="container-carousel">

        {include file="./carousel.tpl"}
        
    </article>

</div>


<article class="container-producto">
    <h1 class="titulo-categoria">{$producto->nombre}</h1>
    <div class="descripcion-producto">
        <h3> {$producto->descripcion}</h3>
        <p>Tamaño: {$producto->tamano} ml.</p>
        <p>Precio: $ {$producto->precio}</p>
    </div>
</article>

{include file="./redesSociales.tpl"}
{include file="../footer.tpl"}

{* display: flex;
    flex-direction: column;
    justify-content: center; *}