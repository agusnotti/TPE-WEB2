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
    <div class="col-lg-6 border border-primary" >
        <div class="card ">
            <div class="card-body text-center ">
                <h4 class="card-title">Ultimos Comentarios</h4>
            </div>
            <div class="comment-widgets " id="{$producto->id}">

            </div>
        </div>
    </div>
</div>

<form>
    {if $isUserLogged}
    <div class="form-group row d-flex justify-content-center w-100 ">
        <h6 class="row d-flex justify-content-center w-100" for="exampleFormControlTextarea1">Dejá tu comentario:</h6>
        <textarea class="form-control row   w-50" id="js-comment-textarea" rows="3"></textarea>
    </div>

    <div class="form-group row d-flex justify-content-center w-100 ">
        <h6 class="row d-flex justify-content-center w-100" for="exampleFormControlTextarea1">Calificación:</h6>
    </div>
    <div class="form-group row d-flex justify-content-center w-100 ">

    <select id="js-select" class="btn btn-cyan btn-sm row flex-shrink-1 w-10 row justify-content-center">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group row d-flex justify-content-center w-100 ">
        <button class="btn btn-cyan btn-sm row flex-shrink-1 w-10 row justify-content-center" id="js-add-comment">Enviar</button>
    </div>
    {/if}

    <input id="js-hidden-userid" type="hidden" value="{$userId}">
    <input id="js-hidden-isadmin" type="hidden" value="{$isAdmin}">
    <input id="js-hidden-username" type="hidden" value="{$userName}">
</form>




<script src="./js/commentBox.js"></script>
{include file="./redesSociales.tpl"}
{include file="../footer.tpl"}
