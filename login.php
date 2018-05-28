<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width initial-scale=1 maxium-scale=1" name="viewport">
        <title>Login</title>
    </head>
    <body>
        <header>
            <p>Login</p>
        </header>
        <section>
            <form action="valida.php" method="post">
                <table>
                    <tr>
                        <td align="right">Login : </td>
                        <td><input name="user" type="text" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Senha : </td>
                        <td><input name="senha" type="password" requid/></td>
                    </tr>
                </table>
                <br/><br/>
                <input type="submit" value="Enviar"/>
            </form>
        </section>
    </body>
</html>