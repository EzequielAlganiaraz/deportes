{include file="header.tpl"}

<div class="container-categoria">
                              
                
                <form class="form-am" method="post" action="actualizarPermisos/{$user->id_usuario}">
                    <h2>{$user->username}</h2>
                    
                    <label for="permisos">Permisos como:</label>
                    <select name="permisos" id="select-categorias">
                        <option value="1"  {if $user->administrador==1} selected {/if}>Administrador </option>
                        <option value="0"{if $user->administrador==0} selected {/if}>Usuario</option>
                    </select>
                    
                    <input class="submit" type="submit" value="Actualizar">
                </form>
        
</div>
{include file="footer.tpl"}