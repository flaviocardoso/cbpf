<?php
if (!isset($_SESSION)) session_start();
$coord = $_SESSION["coord"];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user']) and !isset($coord)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}

include_once("config/maining/path/biblio.php");
$mens = "";
$rows1 = array();
if(isset($coord) and !empty($coord))
{
  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->orderServicePorCoord($coord);
  $rows1 = $rwc[0];
  $count= $rwc[1];
  if($count == 0)
  {
    $mens = "<p>Não encontrado!</p>";
  }
}
if(isset($_POST["nome"]))
{
  echo $_POST["nome"];
}

?>

<!--<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Coordenação Ordem de Serviços</title>
  </head>
  <body>
    <header>
      <p>Seus Pedidos</p>
    </header>
    <section>-->
      <? $mens ?>
      <form id="form_coord" method="post" action="principal">
        <input type="text" name="nome" id="nome"/>
        <input type="submit" name="submit" />
      </form>
      <p></p>
        <?php
          //print_r($rows1);
          if($count > 0)
          {
            foreach ($rows1 as $key => $value) {
              //print_r($value);//ex.: $value['id']
              echo "$value[descr]<br>";
              echo "$value[data]<br>";
              echo "$value[hora]<br>";
              echo "$value[laudo]<br>";
              echo "$value[data_ultima]<br>";
              echo "$value[hora_ultima]<br>";
              echo "<a href=\"os/$value[id]\" target=\"__blank__\">Acessar</a><br>";
            }
          }
        ?>
    </div>
    <script>
      $("#form_coord").submit(function(e)
      {
        e.preventDefault();
        const nome = $("#nome").val();
        $.ajax({
          url: "coordOS",
          type: "POST",
          data: {nome: nome},
          success: function(response)
          {
            $('#content').html(response);
          },
          error: function(xhr, status, error)
          {
            alert(xhr.responseText);
          }
        });
      });
    </script>
<!--
  </body>
</html>-->
