<header class="header">
        <div class="btn_menu">
            <a href="#"><i class="fas fa-bars"></i></a>
            <div><i class="fas fa-search"> </i><input type="search" placeholder="Buscar"> </div>
        </div>
        <nav class="nav">
            <ul class="nav-items nav-izquierdo">

                {foreach from=$categorias item=categoria}
                    <li><a href="categoria/{$categoria->nombre}">{$categoria->nombre}</a></li>
                {/foreach}

            </ul>

            <ul class="nav-items nav-derecho">
                <li class="input-busqueda">
                    <i class="fas fa-search"></i><input type="search" placeholder="Buscar">
                </li>
                <li>
                    {if $isUserLogged}
                        {if $isAdmin}
                            <a href="administrador"><i class="fas fa-user"></i></a>
                            <a href="logout"><i class="fas fa-sign-out-alt"></i></a>
                        {else}
                            <a href="logout"><i class="fas fa-sign-out-alt"></i></a>
                        {/if}
                    {else}
                        <a href="login"><i class="fas fa-user"></i></a>
                    {/if}
                </li>
            </ul>
        </nav>
    </header>