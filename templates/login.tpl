{include file="header.tpl"}
    {if $error}
        <div class="error-container">
            <div class="msj-error">
                <h3> {$error} </h3>
            </div>
        </div>
    {/if}
    <div class="container">
        <form class="form-login" action="iniciarSesion" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Usuario">
            <label for="username">Password</label>
            <input type="password" name="password" placeholder="Password">
            <input class="submit" type="submit" value="Login">
        </form>
    </div>
    </body>
</html>
{include file="footer.tpl"}
