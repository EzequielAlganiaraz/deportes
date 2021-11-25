{include file="header.tpl"}
    <div class="container-search">
        <h2>Filtrar búsqueda por</h2>
        <form class="form-search" method="post" action="filtrarJugadores">
            <div class="row">
                <label for="nombreCompleto">Nombre completo</label>
                <input type="text" name="nombreCompleto" placeholder="Nombre y apellido">

                <label for="dni">Documento de identidad</label>
                <input type="number" name="dni" placeholder="Número de DNI sin puntos">

                <label for="edad">Edad</label>
                <input type="number" name="edad" placeholder="Edad">
            </div>
            <div class="row">
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
            </div>
            <div class="row">
                <input class="submit" type="submit" value="Buscar">
                <button  class="submit" name="showJugadores"><a href="jugadores/1">Mostrar todos</a></button>
            </div>
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
                <div class="acciones">
                    <a id="comments" href="seeComments/{$jugador->id_deportista}">Ver Comentarios</a>
                </div>
                {if !empty($jugador->imagen)}
                    <img class="img-jugador" src="{$jugador->imagen}"/>
                {/if}

            </div>

        {/foreach}
    </div>
    {if $pagina}
    <nav class="paginacion">
        <ul>
            <li><a href="jugadores/{$pagina-1}">Anterior</a></li>          
             
            <li><a href="jugadores/{$pagina+1}">Siguiente</a></li>
            

        </ul>
    </nav>
    {/if}
    {if $smarty.session.ROLE =="administrador"}
        <div class="form-container">
            <form class="form-am" method="post" action="agregarJugador" enctype="multipart/form-data" >
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
                <input type="file" name="img_jugador" >
                <input class="submit" type="submit" value="Agregar">
            </form>
        {/if}
    
    </div>
{include file="footer.tpl"}