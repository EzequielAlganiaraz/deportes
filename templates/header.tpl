 <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <base href='{$BASE_URL}' >
                <link rel="stylesheet" href="css/styles.css">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
                <title>Tudai</title>
            </head>
            <body>
                
                <nav>
                    <ul>
                        <li> <a href="home">Tudai</a> </li>
                        <li> <img src="./image/logo.png" alt="Logo"> </li>
                        {if isset($smarty.session.ID)}
                            {if $smarty.session.ROLE =="administrador"}
                                <li> <a href="showUsuarios">Usuarios</a> </li>
                            {/if}
                            <li><a href="logout">Logout</a></li>
                            
                        {else}
                        <li> <a href="login">Login</a> </li>
                        {/if}
                        

                    </ul>
                </nav>
                
