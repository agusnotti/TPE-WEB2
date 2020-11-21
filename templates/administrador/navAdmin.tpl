<header class="header">
    <nav class="nav">
        <div class="nav-admin-back">
            {if isset($isAdminProducto) || isset($isAdminCategoria) || isset($isAdminUsusario)}
                <ul class="item-nav-admin">
                    <li><a href="administrador"><i class="fas fa-long-arrow-alt-left"></i></a></i></li>
                </ul>
            {/if}
        </div>
        <div class="nav-admin-logout">
            <ul class="item-nav-admin">
                <li><a href="logout"><i class="fas fa-sign-out-alt"></i></a></i></li>
            </ul>
        </div>
    </nav>
</header>