<?php
include("conexao.php");

$id = $_GET["id"];
$rows1 = "";
$rows2 = "";
$rows3 = "";
//echo $id;
$sql1 = "SELECT idos as id, user, nos, nome as solicitante, descr, setor, DATE(datahora) as data, TIME(datahora) as hora FROM orderservice WHERE idos=:id";
$stmt1 = $PDO->prepare($sql1);
$stmt1->bindParam(":id", $id, PDO::PARAM_INT);
$stmt1->execute();
$result1 = $stmt1->rowCount();
if($result1 > 0){
  $rows1 = $stmt1->fetch(PDO::FETCH_ASSOC);
}

$sql2 = "SELECT nome, email, telefone, sala, coord, ala FROM usuario WHERE user=:user";
$stmt2 = $PDO->prepare($sql2);
$stmt2->bindParam(":user", $rows1["user"]);
$stmt2->execute();
$result2 = $stmt2->rowCount();
if($result2 > 0){
  $rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);
}

$sql3 = "SELECT nome, datahora, status, laudo FROM tecnico WHERE idos=:id";
$stmt3 = $PDO->prepare($sql3);
$stmt3->bindParam(":id", $id, PDO::PARAM_INT);
$stmt3->execute();
$result3 = $stmt3->rowCount();
if($result3 > 0){
  $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Ver Ordem de Serviço</title>
  </head>
  <body>
    <header>
      <p>Ordem de Serviço</p>
    </header>
    <section>
      <form action="" method="post" id=form_os>
        <fieldset>
          <legend>Ver Ordem de Serviço</legend>
          <fieldset>
            <legend>Protocolo</legend>
            <input id="nos" type="text" name="nos" value="<? echo $rows1["nos"]; ?> "readonly/>
          </fieldset>
          <fieldset>
            <legend>Dados do Solicitante</legend>
            Nome : <input id="nome" type="text" value="<? echo $rows2["nome"]; ?>" readonly/><br>
            Telefone : <input id="telefone" type="text" value="<? echo $rows2["telefone"]; ?>" readonly/><br>
            Email : <input id="email" type="text" value="<? echo $rows2["email"]; ?>" readonly/><br>
            Coordenação : <input id="coord" type="text" value="<? echo $rows2["coord"]; ?>" readonly/><br>
            Ala : <input id="ala" type="text" value="<? echo $rows2["ala"]; ?>" readonly/><br>
            Sala : <input id="sala" type="text" value="<? echo $rows2["sala"]; ?>" readonly/><br>
          </fieldset>
          <fieldset>
            <legend>Descrição</legend>
            <textarea id="descr" name="descr" cols="30" rows="10" form="form_os" readonly><? echo $rows1["descr"]; ?></textarea>
          </fieldset>
          <fieldset>
            <legend>Laudos Anteriores</legend>
            <?
              foreach ($rows3 as $key => $value) {
                if($value["status"] == "NOVAS"){
                  echo "<p>$value[nome]</p>";
                  echo "<p>$value[laudo]</p>";
                }
              }
            ?>

        </fieldset>
      </form>
    </section>
  </body>
</html>
