<ul class="breadcrumb">
    <li><a href="home"><i class="fas fa-home"></i></a></li>
    {if isset($categoria) && isset($producto)}    
        <li><a href="categoria/{$categoria->nombre}">{$categoria->nombre}</a></li>
        <li>{$producto->nombre}</li>
    {elseif isset($categoria)}
        <li>{$categoria->nombre}</li>    
    {/if}
    
</ul>