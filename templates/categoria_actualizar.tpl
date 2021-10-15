{include file="header_usuario_logueado.tpl"}
<div class="form-container">
        <form class="form-am" method="post" action="updateCategoria/{$categoria->id_categoria}">
            <h2>Actualizar Categoria</h2>

            <label for="nombreDeporte">Nombre del deporte</label>
            <input type="text" name="nombreDeporte" placeholder="ingrese el deporte" value="{$categoria->nombre}">

            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" placeholder="ingrese una breve descripción" value="{$categoria->descripcion}">

            <label for="tipo_competencia">Tipo de competencia</label>
            <input type="text" name="tipo_competencia" placeholder="tipo de competencia" value="{$categoria->tipo_competencia}">
            
            <input class="submit" type="submit" value="Actualizar">
        </form>
    
    </div>

{include file="footer.tpl"}