<?php

if (!isset($_SESSION)) session_start();
$setor = $_SESSION["setor"];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user']) and isset($setor)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
include_once("config/maining/path/biblio.php");
$mens = "";
$rows1 = array();
$count = 0;
if(isset($setor) and !empty($setor))
{
  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->orderServicePorSetor($setor);
  $rows1 = $rwc[0];
  $count = $rwc[1];
  if($count == 0)
  {
    $mens = "Não encontrado!";
  }
}
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
        <? $mens ?>
        <table>
          <?php
          if($count > 0)
          {
            foreach ($rows1 as $key => $value) {
              echo "$value[descr]<br>";
              echo "$value[laudo]<br>";
              echo "$value[dhultima]<br>";
              echo "<a href=\"ver_os.php?id=$value[id]\" target=\"_blank\">Acessar</a><br>";
              // code...
            }
          }
          ?>
        </table>
    </body>
  </html>
