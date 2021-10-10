{include file="header.tpl"}
    <ul>
        {foreach from=$list_categorias item=categoria}
            <li> {$categoria->nombre} </li>
        {/foreach}
    </ul>