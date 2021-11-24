{include file="header.tpl"}
    <div class="container-search">
        <h2>Filtrar búsqueda por</h2>
        <form class="form-search" method="post" action="filtrarJugadores">
            
            <label for="nombreCompleto">Nombre completo</label>
            <input type="text" name="nombreCompleto" placeholder="Nombre y apellido">

            <label for="dni">Documento de identidad</label>
            <input type="number" name="dni" placeholder="Número de DNI sin puntos">

            <label for="edad">Edad</label>
            <input type="number" name="edad" placeholder="Edad">

            <label for="altura">Altura (cm)</label>
            <input type="number" name="altura" placeholder="Altura en CM">

            <label for="domicilio">Domicilio</label>
            <input type="text" name="domicilio" placeholder="Domicilio">

            <label for="categorias">Deporte</label>
            <select name="categorias" id="select-categorias">
                    <option value="" select>Seleccione un deporte</option>
                    {foreach from=$lista_categorias item=categoria}
                        <option value={$categoria->nombre}>{$categoria->nombre}</option>
                    {/foreach}
            </select>
            
            <input class="submit" type="submit" value="Buscar">
            <button  class="" name="showJugadores"><a href="jugadores">Mostrar todos</a></button>
        </form>
    </div>

    {if $error}
        <div class="error-container">
            <div class="msj-error">
                <h3> {$error} </h3>
            </div>
        </div>
    {/if}
    
    <div class="container-categoria">
        {foreach from=$lista_jugadores item=jugador}
            
            <div class="card-container">
                <h2>{$jugador->nombre_apellido}</h2>
                <h3>DNI: {$jugador->dni}</h3>
                <h3>Edad: {$jugador->edad}</h3>
                <h3>Altura: {$jugador->altura} cm</h3>
                <h3>Domicilio: {$jugador->domicilio}</h3>
                <h3>Categoria: {$jugador->nombre}</h3>
                {if $smarty.session.ROLE =="administrador"}
                    <div class="acciones">
                        <a id="actualizar" href="actualizarJugador/{$jugador->id_deportista}">Actualizar</a>
                        <a id="borrar" href="borrarJugador/{$jugador->id_deportista}">Borrar</a>
                    </div>
                {/if}
            </div>

        {/foreach}
    </div>

    {if $smarty.session.ROLE =="administrador"}
        <div class="form-container">
            <form class="form-am" method="post" action="agregarJugador">
                <h2>Agregar Jugador</h2>
                <label for="nombreCompleto">Nombre completo</label>
                <input type="text" name="nombreCompleto" placeholder="Nombre y apellido">
                <label for="dni">Documento de identidad</label>
                <input type="number" name="dni" placeholder="Número de DNI sin puntos">
                <label for="edad">Edad</label>
                <input type="number" name="edad" placeholder="Edad">
                <label for="altura">Altura (cm)</label>
                <input type="number" name="altura" placeholder="Altura en CM">
                <label for="domicilio">Domicilio</label>
                <input type="text" name="domicilio" placeholder="Domicilio">
                <label for="categoria">Categorias</label>
                <select name="categoria" id="select-categorias">
                    {foreach from=$lista_categorias item=categoria}
                        <option value={$categoria->id_categoria}>{$categoria->nombre}</option>
                    {/foreach}
                </select>
                <input class="submit" type="submit" value="Agregar">
            </form>
        {/if}
    
    </div>
{include file="footer.tpl"}