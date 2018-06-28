<?php

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
