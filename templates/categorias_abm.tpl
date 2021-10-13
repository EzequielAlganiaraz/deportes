{include file="header_usuario_logueado.tpl"}
    <div class="container-categoria">
        {foreach from=$list_categorias item=categoria}
            
            <div class="card-container">
                <h2>{$categoria->nombre}</h2>
                <h3>Tipo de competencia: {$categoria->tipo_competencia}</h3>
                <p>{$categoria->descripcion}</p>
                 <div class="acciones">
                    <a id="actualizar" href="actualizarCategoria/{$categoria->id_categoria}">Actualizar</a>
                    <a id="borrar" href="borrarCategoria/{$categoria->id_categoria}">Borrar</a>                    
                </div>
            </div>

        {/foreach}

    </div>
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