<?php
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
  include("biblio.php");
  include("conexao.php");

  //session_start();
  //inserido para todos -> remover da página atendidos e não atendidos. Deixar a privelégio de pesquisa.
  $user = $_SESSION["user"];

  $sql1 = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) where os.user=:user";
  //$sql1 = "SELECT * FROM tecnico as JOIN orderservice as os using "
  $stmt1 = $PDO->prepare($sql1);
  $stmt1->bindParam(':user', $user, PDO::PARAM_STR);
  $stmt1->execute();
  //$result1 = $stmt1->rowCount();
  $rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

  $result1 = $stmt1->rowCount();

  $sql2 = "SELECT idos as id, nos, nome as solicitante, descr, setor, DATE(datahora) as data, TIME(datahora) as hora FROM orderservice WHERE user='".$user."'";
  //$stmt2 = $PDO->prepare($sql2);
  //$stmt2->bindParam(':user', $user, PDO::PARAM_STR);
  //$stmt2->execute();
  //$rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);
  $stmt2 = $PDO->query($sql2);
  $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

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
      <p>Todos</p>
      <table>
        <?php
          //print_r($rows1);
          if ($result1 > 0){
            foreach ($rows1 as $key => $value) {
              //print_r($value);//ex.: $value['id']
              echo "$value[descr]<br>";
              echo "$value[laudo]<br>";
              echo "$value[id]<br>";
            }
          }

        ?>
      </table>
      <p>Erros</p>
      <table>
        <?php
          print_r($rows2);
          //foreach ($rows2 as $key => $value) {
          //  echo $rows2[$key] . "   ";
          //}
        ?>
      </table>
  </body>
</html>
