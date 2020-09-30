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
                        <td >{$producto->nombre}</td>
                        <td >{$producto->descripcion}</td>
                        <td >{$producto->tamano}</td>
                        <td class="td-prodPrecio">$ {$producto->precio}</td>
                        <td>{$producto->nombre_categoria}</td>
                        <td>
                            <a href="categoria/{$producto->nombre_categoria}/producto/{$producto->id}">
                                <button class="btn-tabla-ver" i><i class="fas fa-eye"></i></button>
                            </a>
                        </td>
                    </tr>
                {/foreach}

            </tbody>
        </table>
    </section>
</article>