{include file="header.tpl"}

<div class="container-categoria">
                              
                
                <form class="form-am" method="post" action="actualizarPermisos/{$user->id_usuario}">
                    <h2>{$user->username}</h2>
                    
                    <label for="permisos">Permisos como:</label>
                    <select name="permisos" id="select-categorias">
                        <option value="administrador"  {if $user->role=='administrador'} selected {/if}>Administrador </option>
                        <option value="usuario"{if $user->role=='usuario'} selected {/if}>Usuario</option>
                    </select>
                    
                    <input class="submit" type="submit" value="Actualizar">
                </form>
        
</div>
{include file="footer.tpl"}