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
  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->orderServicePorTec($user, $setor);
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
?>
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
    </header>
    <section>
      <? $mens; ?>
      <table>
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
            echo "<a href=\"ver_os.php?id=$value[id]\" target=\"_blank\">Acessar</a><br>";
            // code...
          }
        }
        ?>
  </body>
</html>
