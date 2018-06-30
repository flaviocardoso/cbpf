<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1 maxium-scale=1" name="viewport">
        <title>Formulário de login</title>
    </head>
    <body>
        <header>
            <p>Login</p>
        </header>
        <section>
            <form action="verifica_usuario.php" method="post">
                <p>Login: <input name="usuario" type="text" id="usuario" /></p>Senha: <input name="senha" type="text" id="senha"/>
                <p></p>
                <input type="submit" name="submit" value="Enviar"/>
            </form>
        </section>
    </body>
</html>