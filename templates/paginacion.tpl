 {* PASAR A TEMPLATE *}
 <div class="row d-flex justify-content-center">
     <nav aria-label="Page navigation example">
         <ul class="pagination text-center">
             {if $paginaActual > 1}
                 <li class="page-item m-2"><a href="{$url}{$paginaActual-1}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span></a>
                 </li>
             {else}
                 <li class="page-item m-2 disabled"><a href="{$url}{$paginaActual}" aria-label="Previous">
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

             {if $paginaActual < $cantidadPaginas} 
                <li class="page-item m-2"><a href="{$url}{$paginaActual+1}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span></a>
                </li>
            {else}
                <li class="page-item disabled m-2"><a href="{$url}{$paginaActual}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span></a>
                </li>
            {/if}
         </ul>
     </nav>
 </div>