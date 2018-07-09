<?php
if (!isset($_SESSION)) session_start();
$user = $_SESSION["user"];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
include("config/maining/path/biblio.php");
$mens = "";
$count = 0;
$rows1 = array();
if(isset($user) and !empty($user))
{
  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->orderServicePorSolic($user);
  $rows1 = $rwc[0];
  $count = $rwc[1];
  if($count == 0)
  {
    $mens = "<p>Não encontrado</p>";
  }
}
if(isset($_POST["nome"]))
{
  echo entrada($_POST["nome"]);
}
echo $_POST["hander"];
?>
<!--<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Seus Pedidos</title>
  </head>
  <body>
    <header>
      <p>Seus Pedidos</p>
    </header> -->
    <section>
      <? $mens ?>
      <form id="form_data" action="principal" method="post">
        <input type="text" name="nome" id="nome"/>
        <input type="submit" id="submit" name="submit" value="Enviar"/>
      </form>
      <div>
        <?php
          //print_r($rows1);
          if ($count > 0){
            foreach ($rows1 as $key => $value) {
              echo "$value[descr]<br>";
              echo "$value[data]<br>";
              echo "$value[hora]<br>";
              echo "$value[laudo]<br>";
              echo "$value[data_ultima]<br>";
              echo "$value[hora_ultima]<br>";
              if($value["arquivo"]) echo "$value[arquivo]<br>";
              echo "<a href=\"os/$value[id]\" target=\"__blank__\">Acessar</a><br>";
            }
          }

        ?>
      </div>
      <script>
      $("#form_data").submit(function(e)
      {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        formData.append("hander", "<? if(isset($_POST['hander'])) echo $_POST['hander']; ?>");
        $.ajax({
          url: "<? if(isset($_POST['hander'])) echo $_POST['hander']; ?>",
          type: "POST",
          data: formData,
          success: function(response)
          {
            $('#content').html(response);
          },
          error: function(xhr, status, error)
          {
            alert(xhr.responseText);
          },
          async: false,
          cache: false,
          contentType: false,
          processData: false
        });
        return false;
      });
      </script>
  </body>
</html>
