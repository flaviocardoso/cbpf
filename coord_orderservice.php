<?php
include("conexao.php");
include("biblio.php");

session_start();
$coord = $_SESSION["coord"];
//echo $coord;
$sql1 = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, user, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) WHERE os.coord=:coord";
$stmt1 = $PDO->prepare($sql1);
$stmt1->bindParam(":coord", $coord, PDO::PARAM_STR);
$stmt1->execute();
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
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
    <section>
      <p>Todos</p>
      <table>
        <?php
          //print_r($rows1);
            foreach ($rows1 as $key => $value) {
              //print_r($value);//ex.: $value['id']
              echo "$value[descr]<br>";
              echo "$value[data]<br>";
              echo "$value[hora]<br>";
              echo "$value[laudo]<br>";
              echo "$value[data_ultima]<br>";
              echo "$value[hora_ultima]<br>";
              echo "<a href=\"ver_os.php?id=$value[id]\" target=\"_blank\">Acessar</a><br>";
            }


        ?>
      </table>
      <p>Erros</p>
      <table>
        <?php
          //print_r($rows2);
          //foreach ($rows2 as $key => $value) {
          //  echo $rows2[$key] . "   ";
          //}
        ?>
      </table>
  </body>
</html>
