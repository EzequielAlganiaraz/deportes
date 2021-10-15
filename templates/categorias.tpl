{include file="header.tpl"}
    <div class="container-categoria">
        {foreach from=$list_categorias item=categoria}
            
            <div class="card-container">
                <h2>{$categoria->nombre}</h2>
                <h3>Tipo de competencia: {$categoria->tipo_competencia}</h3>
                <p>{$categoria->descripcion}</p>
                <a href="jugadoresCategoria/{$categoria->id_categoria}">Ver jugadores</a>
            </div>

        {/foreach}

    </div>
{include file="footer.tpl"}