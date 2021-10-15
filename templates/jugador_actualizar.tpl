{include file="header_usuario_logueado.tpl"}
<div class="form-container">
        <form class="form-am" method="post" action="updateJugador/{$jugador->id_deportista}">
            <h2>Actualizar Jugador</h2>
            <label for="nombreCompleto">Nombre completo</label>
            <input type="text" name="nombreCompleto" placeholder="Nombre y apellido" value="{$jugador->nombre_apellido}">
            <label for="dni">Documento de identidad</label>
            <input type="number" name="dni" placeholder="Número de DNI sin puntos" value={$jugador->dni}>
            <label for="edad">Edad</label>
            <input type="number" name="edad" placeholder="Edad" value={$jugador->edad}>
            <label for="altura">Altura (cm)</label>
            <input type="number" name="altura" placeholder="Altura en CM" value={$jugador->altura}>
            <label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" placeholder="Domicilio" value="{$jugador->domicilio}">
            <label for="categoria">Categorias</label>
            <select name="categoria" id="select-categorias">
                 {foreach from=$lista_categorias item=categoria}
                    <option value={$categoria->id_categoria} {if $categoria->id_categoria == $jugador->id_categoria} selected {/if}>{$categoria->nombre}</option>
                 {/foreach}
            </select>
            <input class="submit" type="submit" value="Actualizar">
        </form>
    
    </div>
{include file="footer.tpl"}