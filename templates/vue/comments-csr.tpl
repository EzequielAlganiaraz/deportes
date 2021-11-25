<input id="idJugador" name="idJugador" type="number" value="{$id}" hidden>
{literal}
    <section id="comments">
        <ul>
            <li v-for="coment in coments">
                <p> {{ coment.descripcion }} | Puntaje: {{ coment.puntaje }} </p>
{/literal}
                    {if isset($smarty.session.ID)}
                        {if $smarty.session.ROLE =="administrador"}
                            {literal}
                            <button :id="coment.id_comentario" v-on:click="deleteComment">X</button>
                            {/literal}
                        {/if}
                    {/if}
                {literal}
            </li>
        </ul>
                {/literal}
        {if isset($smarty.session.ID)}
            {if $smarty.session.ROLE =="usuario"}
                {literal}
                    <button id="btn-agr" v-on:click="showFormAdd" class="submit" type="button">Agregar</button>
                {/literal}
            {/if}
        {/if}
    {literal}
        <form v-if="showForm" class="form-am" id="add-comment">
            <h2>Agregar Comentario</h2>
            <label for="comentario">Comentario</label>
            <input type="text" name="comentario" placeholder="Comentario">
            <select name="puntaje" id="select-puntaje">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input class="submit" v-on:click="addComment" value="Actualizar">
        
        </form>    
    </section>

{/literal}

