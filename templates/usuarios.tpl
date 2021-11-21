{include file="header.tpl"}
        
    <div class="container-categoria">
        {foreach from=$users item=usuario}
            
            <div class="card-container">
                <h2>{$usuario->username}</h2>
                <h3>Permisos:</h3>                
                
                <form class="form-am" method="post" action="actualizarPermisos/{$usuario->id_usuario}">
                    <h2>Permisos de usuario:</h2>
                    
                    <label for="ComentarJugadores">Comentar jugadores</label>
                    <select name="ComentarJugadores" id="select-categorias">
                        <option value="1"  {if $usuario->comentarJugadores==1} selected {/if}> Activada </option>
                        <option value="0"{if $usuario->comentarJugadores==0} selected {/if}>Desactivado</option>
                    </select>
                    <label for="ActualizarJugadores">Actualizar jugadores</label>
                    <select name="ActualizarJugadores" id="select-categorias">
                        <option value="1"  {if $usuario->actualizarJugadores==1} selected {/if}> Activada </option>
                        <option value="0"{if $usuario->actualizarJugadores==0} selected {/if}>Desactivado</option>
                    </select>
                    <label for="AgregarJugadores">Agregar jugadores</label>
                    <select name="AgregarJugadores" id="select-categorias">
                        <option value="1"  {if $usuario->agregarJugadores==1} selected {/if}> Activada </option>
                        <option value="0" {if $usuario->agregarJugadores==0} selected {/if}>Desactivado</option>
                    </select>
                    <label for="BorrarJugadores">Borrar jugadores</label>
                    <select name="BorrarJugadores" id="select-categorias">
                        <option value="1"  {if $usuario->borrarJugadores==1} selected {/if}> Activada </option>
                        <option value="0"{if $usuario->borrarJugadores==0} selected {/if}>Desactivado</option>
                    </select>
                    <input class="submit" type="submit" value="Actualizar">
                </form>
        
                
    <div class="acciones">
                    <a id="borrar" href="borrarUsuario/{$usuario->id_usuario}">Eliminar usuario</a>
                </div>
            </div>

        {/foreach}
    </div>