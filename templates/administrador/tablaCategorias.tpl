<article class="categorias">
<section class="tabla-categorias">
        <h2>Listado de categorias</h2>
        <table>
            <thead>
                <tr>
                    <th class="td-prodNombre">Categoria</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="body-tabla">

                {foreach from=$categorias item=categoria}
                    <tr id="{$categoria->id}">
                        <td>{$categoria->nombre}</td>
                        <td>
                            <a href="delete-categoria/{$categoria->id}">
                                <button class="btn-tabla-borrar"><i class="far fa-trash-alt"></i></button>
                            </a>
                            <a>
                                <button class="btn-tabla-editar-categoria"><i class="fas fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                {/foreach}

            </tbody>
        </table>
    </section>
</article>