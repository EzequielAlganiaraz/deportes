{include file="header.tpl"}
    <div class="container-categoria">
        {foreach from=$lista_jugadores_categoria item=jugador}
            
            <div class="card-container">
                <h2>{$jugador->nombre_apellido}</h2>
                <h3>Edad: {$jugador->edad}</h3>
                <h3>Altura: {$jugador->altura}</h3>
                <h3>Domicilio: {$jugador->domicilio}</h3>
            </div>

        {/foreach}

    </div>