<article class="usuarios">
    <section class="tabla-usuarios">
        <h2>Listado de usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th class="td-username">Username</th>
                    <th>Permisos administrador</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="body-tabla">

                {foreach from=$usuarios item=usuario}
                    <tr id="{$usuario->id}">
                        <td>{$usuario->email}</td>
                        <td>
                            {if $usuario->permiso}
                                <a class="favorite-true" href="administrador/usuarios/deshabilitar/{$usuario->id}">
                                    <i class="fas fa-check-circle"></i>
                                </a>
                            {else}
                                <a class="favorite-false" href="administrador/usuarios/habilitar/{$usuario->id}">
                                    <i class="fas fa-times-circle"></i>
                                </a>
                            {/if}
                        </td>
                        <td>
                            <a href="administrador/usuarios/delete/{$usuario->id}">
                                <button class="btn-tabla-borrar"><i class="far fa-trash-alt"></i></button>
                            </a>
                        </td>
    
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </section>
</article>