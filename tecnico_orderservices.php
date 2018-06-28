<?php
include("conexao.php");
include("biblio.php");

//fazer query para pergar user e setor para mostrar as ordem de serviços alteradas por usuario
session_start();
$user = $_SESSION["user"];

$sql1 = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) where te.user=:user";

$stmt1 = $PDO->prepare($sql1);
$stmt1->bindParam(":user", $user, PDO::PARAM_STR);
$stmt1->execute();
$rows1 = $stmt1->fetchAll(PDP::FETCH_ASSOC);

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
      <p>Respondidas</p>
      <table>
        <?php
          foreach ($rows1 as $key => $value) {
            echo "$value[descr]<br>";
            echo "$value[laudo]<br>";
            echo "$value[dhultima]<br>";
            echo "<a href=\"ver_os.php?id=$value[id]\" target=\"_blank\">Acessar</a><br>";
            // code...
          }
        ?>
      </table>
      <p>Novas</p>
      <table>
        <?php
          print_r($rows2);
        ?>
      </table>
  </body>
</html>
