{include file="header.tpl"}
    {if $error}
        <div class="error-container">
            <div class="msj-error">
                <h3> {$error} </h3>
            </div>
        </div>
    {/if}
    <div class="container-categoria">
        {foreach from=$list_categorias item=categoria}
            
            <div class="card-container">
                <h2>{$categoria->nombre}</h2>
                <h3>Tipo de competencia: {$categoria->tipo_competencia}</h3>
                <p>{$categoria->descripcion}</p>
                {if isset($smarty.session.ID)}
                    {if $smarty.session.ROLE =="administrador"}
                        <div class="acciones">
                            <a id="actualizar" href="actualizarCategoria/{$categoria->id_categoria}">Actualizar</a>
                            <a id="borrar" href="borrarCategoria/{$categoria->id_categoria}">Borrar</a>                    
                        </div>
                    {/if}
                {/if}    
            </div>

        {/foreach}

    </div>
     {if isset($smarty.session.ID)}
        {if $smarty.session.ROLE =="administrador"}
            <div class="form-container">
                <form class="form-am" method="post" action="agregarCategoria">
                    <h2>Agregar Categoria</h2>
                    <label for="nombreDeporte">Nombre del deporte</label>
                    <input type="text" name="nombreDeporte" placeholder="ingrese el deporte">

                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" placeholder="ingrese una breve descripción">

                    <label for="tipo_competencia">Tipo de competencia</label>
                    <input type="text" name="tipo_competencia" placeholder="tipo de competencia">
                    
                    <input class="submit" type="submit" value="Agregar">
                </form>
            
            </div>
        {/if}
    {/if}
{include file="footer.tpl"}