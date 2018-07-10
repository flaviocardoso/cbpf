<?php
include_once("config/maining/path/biblio.php");
$flag = "";
$mens = "";
if(isset($_POST["submit"]))
{
  include_once("config/maining/path/CN.php");

  $user = entrada($_POST['user']);
  $senha = entrada($_POST['senha']);
  $PDO = new CN();
  $flag = $PDO->verfUSER($user,$senha);

  if ($flag == "OK")
  {
    header("Location: principal");exit;
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
        <title>Login</title>
    </head>
    <body>
        <header>
            <p>Login</p>
            <? verfFlag($flag); ?>
        </header>
        <section>
          <? $mens; ?>
            <form action="login" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td align="right">Login : </td>
                        <td><input name="user" type="text" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Senha : </td>
                        <td>
                          <input name="senha" type="password" required/>
                          <a href="http://localhost:8080/cbpf/cadastro.php">Não tem login? Cadastre-se!</a>
                        </td>
                    </tr>
                </table>
                <br/><br/>
                <input type="submit" name="submit" value="Enviar"/>
            </form>
        </section>
    </body>
</html>
