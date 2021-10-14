{include file="header.tpl"}
    <div class="container-categoria">
        {foreach from=$lista_jugadores item=jugadores}
            
            <div class="card-container">
                <h2>{$jugadores->nombre_apellido}</h2>
                <h3>DNI: {$jugadores->dni}</h3>
                <h3>Edad: {$jugadores->edad}</h3>
                <h3>Altura: {$jugadores->altura} cm</h3>
                <h3>Domicilio: {$jugadores->domicilio}</h3>
                <h3>Categoria: {$jugadores->nombre}</h3>
            </div>

        {/foreach}

    </div>