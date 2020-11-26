<article class="productos">
    <section class="tabla-productos">
        <h2 class="titulo-categoria">Lista de productos</h2>
        <table>
            <thead>
                <tr>
                    <th class="td-prodNombre">Producto</th>
                    <th class="td-prodDeescripcion">Descripción</th>
                    <th class="td-prodTamano">Tamaño</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="body-tabla">

                {foreach from=$productos item=producto}
                    <tr id="{$producto->id}">
                        <td>{$producto->nombre}</td>
                        <td>{$producto->descripcion}</td>
                        <td>{$producto->tamano}</td>
                        <td class="td-prodPrecio">$ {$producto->precio}</td>
                        <td>{$producto->nombre_categoria}</td>
                        <td>
                            {if !isset($isLogged)}
                                <a href="categoria/{$producto->nombre_categoria}/producto/{$producto->id}">
                                    <button class="btn-tabla-ver"><i class="fas fa-eye"></i></button>
                                </a>
                            {else}
                                <a href="delete/{$producto->id}">
                                    <button class="btn-tabla-borrar"><i class="far fa-trash-alt"></i></button>
                                </a>
                                <a>
                                    <button class="btn-tabla-editar"><i class="fas fa-edit"></i></button>
                                </a>
                            {/if}
                        </td>
                    </tr>
                {/foreach}

            </tbody>
        </table>
    </section>
</article>


 {* PASAR A TEMPLATE *}
<div class="row d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination text-center">
            {if $paginaActual > 1}
                <li class="page-item"><a href="{$url}{$paginaActual-1}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span></a>
                </li>
            {else}
                <li class="page-item disabled"><a href="{$url}{$paginaActual}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span></a>
                </li>
            {/if}

            {for $i=1 to $cantidadPaginas}
                {if $i eq $paginaActual}
                    <li class="page-item active" id="{$i}"><a href="{$url}{$i}" value="{$i}" class="page-link">{$i}</a></li>
                {else}
                    <li class="page-item" id="{$i}"><a href="{$url}{$i}" value="{$i}" class="page-link">{$i}</a></li>
                {/if}
            {/for}
            {* <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li> *}
            {if $paginaActual < $cantidadPaginas} 
                <li class="page-item"><a href="{$url}{$paginaActual+1}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span></a>
                </li>
            {else}
                <li class="page-item disabled"><a href="{$url}{$paginaActual}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span></a>
                </li>
            {/if}
            
        </ul>
    </nav>
</div>


{* <div class="clearfix">
    {if $cantidadProductos eq 0}
        <div class="hint-text">Mostrando <b>{$productoInicial} a {$productoFinal}</b> productos de <b>{$cantidadProductos}</b> </div>
    {else}
        <div class="hint-text">Mostrando <b>{$productoInicial +1} a {$productoFinal}</b> productos de <b>{$cantidadProductos}</b> </div>
    {/if}
    <ul class="pagination" value="{$cantidadPaginas}">

        {if $paginaActual > 1}
            <li class="page-item"><a class='paginacion' href="productos/{$paginaActual-1}">Previous</a></li>
        {else}
            <li class="page-item disabled"><a class='paginacion' href="productos/{$paginaActual}">Previous</a></li>
        {/if}

        {for $var=1 to $cantidadPaginas}
            {if $var eq $paginaActual}
                <li class="page-item active" id="{$var}"><a class='paginacion' href="productos/{$var}" value="{$var}" class="page-link">{$var}</a></li>
            {else}
                <li class="page-item" id="{$var}"><a class='paginacion' href="productos/{$var}" value="{$var}" class="page-link">{$var}</a></li>
            {/if}
        {/for}

        {if $paginaActual < $cantidadPaginas} <li class="page-item"><a class='paginacion' href="productos/{$paginaActual+1}">Next</a></li>
            {else}
                <li class="page-item disabled"><a class='paginacion' href="productos/{$paginaActual}">Next</a></li>
            {/if}
    </ul>
</div> *}
