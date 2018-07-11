<?php
if (!isset($_SESSION)) session_start();
$user = $_SESSION["user"];
$setor = $_SESSION["setor"];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
include("config/maining/path/biblio.php");
$mens = "";
$rows1 = array();
$count = 0;
if(isset($setor) and !empty($setor))
{
  include_once("config/maining/path/OrderService.php");
  $OS = new ClassOS();
  $OS->user = $user;
  $OS->setor = $setor;

  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->orderServicePorTec($OS);
  $rows1 = $rwc[0];
  $count = $rwc[1];
  if($count == 0)
  {
    $mens = "Não encontrado!";
  }
}
/*
$sql1 = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, user, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) WHERE te.user=:user and te.setor=:setor";

$stmt1 = $PDO->prepare($sql1);
$stmt1->bindParam(":user", $user, PDO::PARAM_STR);
$stmt1->bindParam(":setor", $setor, PDO::PARAM_STR);
$stmt1->execute();
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
//print_r($rows1);
*/
if(isset($_POST["nome"]))
{
  echo entrada($_POST["nome"]);
}
echo $_POST["hander"];
?>
<!--
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Serviços Prestados</title>
  </head>
  <body>
    <header>
      <p>Ordens de Serviços</p>
    </header> -->
    <section>
      <? $mens; ?>
      <form id="form_data" action="principal" method="post">
        <input type="text" name="nome" id="nome"/>
        <input type="submit" id="submit" name="submit" value="Enviar"/>
      </form>
      <div>
        <?php
        if($count > 0)
        {
          foreach ($rows1 as $key => $value) {
            echo "$value[descr]<br>";
            echo "$value[data]<br>";
            echo "$value[hora]<br>";
            echo "$value[laudo]<br>";
            echo "$value[data_ultima]<br>";
            echo "$value[hora_ultima]<br>";
            if($value["arquivo"])
            {
              echo "<a href=\"os/arquivo/$value[id]\" target=\"__blank__\">Aquivo</a><br>";
            }
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
