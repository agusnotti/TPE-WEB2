<header class="header">
    <nav class="nav">
        <div class="nav-admin-back">
            <ul class="item-nav-admin">
                <li>
                    {if isset($isAdminProducto) || isset($isAdminCategoria) || isset($isAdminUsusario)}
                        <a href="administrador">
                    {else}
                    <a href="home">
                    {/if}
                    <i class="fas fa-long-arrow-alt-left"></i></a></i>
                </li>
            </ul>
        </div>
        <div class="nav-admin-logout">
            <ul class="item-nav-admin">
                <li><a href="logout"><i class="fas fa-sign-out-alt"></i></a></i></li>
            </ul>
        </div>
    </nav>
</header>