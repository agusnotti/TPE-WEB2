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
        <img src="{$producto->imagen}" alt="{$producto->nombre}">
        <h3> {$producto->descripcion}</h3>
        <p>Tamaño: {$producto->tamano} ml.</p>
        <p>Precio: $ {$producto->precio}</p>
    </div>
</article>


<div class="row d-flex justify-content-center mt-100 mb-100">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Latest Comments</h4>
            </div>
            <div class="comment-widgets" id="{$producto->id}">

            </div>
        </div>
    </div>
</div>

<script src="./js/commentBox.js"></script>
{include file="./redesSociales.tpl"}
{include file="../footer.tpl"}
