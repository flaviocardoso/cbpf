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
      <? $mens ?>
      <table>
        <?php
          //print_r($rows1);
          if ($count > 0){
            foreach ($rows1 as $key => $value) {
              //print_r($value);//ex.: $value['id']
              echo "$value[descr]<br>";
              echo "$value[laudo]<br>";
              echo "$value[id]<br>";
            }
          }

        ?>
      </table>
  </body>
</html>
