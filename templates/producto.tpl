{include file="header.tpl"}
{include file="breadcrumb.tpl"}

<article class="container-producto">
    <img src="images/producto.jpg" alt="Geranio">
    <div class="descripcion-producto">
        <h2>{$producto->nombre}</h2>
        <p>Descripción: {$producto->descripcion}</p>
        <p>Tamaño: {$producto->tamano} ml.</p>
        <p>Precio: ${$producto->tamano}</p>
    </div>
</article>

{include file="footer.tpl"}