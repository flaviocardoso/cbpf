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
    <script src="animation.js"></script>
    <link rel="stylesheet" href="screen.css">
  </head>
  <body>
    <header>
      <p>Ordem de Serviço</p>
    </header>
    <section>
      <form action="" method="post" id=form_os>
        <fieldset id="os">
          <legend>Ver Ordem de Serviço</legend>
          <fieldset id="prot">
            <legend>Protocolo</legend>
            <span id="nos"><? echo $rows1["nos"]; ?></span>
          </fieldset>
          <div id="solic">
            <div id="dados">
              <fieldset>
                <legend>Dados do Solicitante</legend>
                <div id="div_dados">
                  <div id="div_nome">Nome : <span id="nome"><? echo $rows2["nome"];?></span></div>
                  <div id="div_telefone">Telefone : <span id="telefone"><? echo $rows2["telefone"]; ?></span></div>
                  <div id="div_email">Email : <span id="email"><? echo $rows2["email"]; ?></span></div>
                  <div id="div_coord">Coordenação : <span id="coord"><? echo $rows2["coord"]; ?></span></div>
                  <div id="div_ala">Ala : <span id="ala"><? echo $rows2["ala"]; ?></span></div>
                  <div id="div_sala">Sala : <span id="sala"><? echo $rows2["sala"]; ?></span></div>
                </div>
              </fieldset>
            </div>
            <div id="descr">
              <fieldset>
                <legend>Descrição</legend>
                <div id="div_descr">
                  <? echo $rows1["descr"]; ?>
                </div>
              </fieldset>
            </div>
          </div>
          <fieldset id="laudo">
            <legend>Laudo</legend>
            <textarea id="text_laudo" rows="5" cols="55" form="form_os" placeholder="Escreva Seu Laudo Aqui!"></textarea>
            <div id="bot">
              <button type="submit">Confirmar</button>
              <button type="button" onclick="closeScreen()">Cancelar</button>
            </div>
          </fieldset>
        </fieldset>
        <fieldset id="laudos">
          <legend>Laudos Anteriores</legend>
          <div id="div_laudos">
          <?
            foreach ($rows3 as $key => $value) {
              if($value["status"] == "NOVAS"){
                echo "<div id='ant_laudo'>";
                echo "  <div>$value[nome]</div>";
                echo "  <div>$value[laudo]</div>";
                echo "</div>";
              }
            }
          ?>
        </div>
        </fieldset>
      </form>
    </section>
  </body>
</html>
