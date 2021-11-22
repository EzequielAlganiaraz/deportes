{include file="header.tpl"}
    

    <div class="container-categoria">
        <table class="tabla-usuarios">
            
                <thead>
                    <tr>
                        <td>Usuarios</td>
                        <td>Permisos</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$users item=usuario}
                    <tr>
                        <td>{$usuario->username} {if $usuario->administrador==0}<img src="https://img.icons8.com/ios/50/000000/manager.png"/>{else}<img src="https://img.icons8.com/ios/50/000000/admin-settings-male.png"/>{/if}</td>
                        <td><a href="permisos/{$usuario->id_usuario}"><img src="https://img.icons8.com/color/48/000000/key.png"/></a></td>
                        <td><a href="borrarUsuario/{$usuario->id_usuario}"><img src="https://img.icons8.com/ios-filled/50/000000/delete--v2.png"/></a></td>
                    </tr>
                    {{/foreach}}
                </tbody>
        </table>
        
    </div>
{include file="footer.tpl"}