<?php
include("conexao.php");
include("biblio.php");

//fazer query para pergar user e setor para mostrar as ordem de serviços alteradas por usuario

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
