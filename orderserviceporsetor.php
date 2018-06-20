<?php
  include("biblio.php");
  include("conexao.php");

  session_start();
  $setor = $_SESSION["setor"];

  $sql1 = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, DATE(os.datahora) as data, TIME(os.datahora) as hora, te.nome as tecnico, te.datahora as dhultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico order by datahora desc) te using(idos) where te.setor=:setor";

  $stmt1 = $PDO->prepare($sql1);
  $stmt1->bindParam(':setor', $setor, PDO::PARAM_STR);
  $stmt1->execute();
  //$result1 = $stmt1->rowCount();
  $rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

  $sql2 = "SELECT idos as id, nos, nome as solicitante, descr, setor, DATE(datahora) as data, TIME(datahora) as hora FROM orderservice WHERE setor=:setor";
  $stmt2 = $PDO->prepare($sql2);
  $stmt2->bindParam(':setor', $setor, PDO::PARAM_STR);
  $stmt2->execute();
  $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
      <title>Ordem de Servico</title>
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
