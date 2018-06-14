<?php
  include("biblio.php");
  include("conexao.php");

  session_start();
  $user = $_SESSION["user"];

  $sql1 = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, os.datahora as dhentrada, te.nome as tecnico, te.datahora as dhultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico order by datahora desc LIMIT 1,1) te where os.user=:user";

  $stmt1 = $PDO->prepare($sql1);
  $stmt1->bindParam(':user', $user, PDO::PARAM_STR);
  $stmt1->execute();
  //$result1 = $stmt1->rowCount();
  $rows1 = $stmt1->fetch(PDO::FETCH_ASSOC);

  $sql2 = "SELECT idos as id, nos, nome as solicitante, descr, setor, DATE(datahora) as data, TIME(datahora) as hora FROM orderservice WHERE user=:user";
  $stmt2 = $PDO->prepare($sql2);
  $stmt2->bindParam(':user', $user, PDO::PARAM_STR);
  $stmt2->execute();
  $rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Seus Pedidos</title>
  </head>
  <body>
    <header>
      <p>Seus Pedidos</p>
    </header>
    <section>
      <p>Atendidos</p>
      <table>
        <?php
          print_r($rows1);
        ?>
      </table>
      <p>Não Atendidos</p>
      <table>
        <?php
          print_r($rows2);
        ?>
      </table>
