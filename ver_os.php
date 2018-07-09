<?php
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
include_once("config/maining/path/CN.php");
$PDO = new CN();
$id = $_GET["id"];
$rows1 = "";
$rows2 = "";
$rows3 = "";

//$rwc1 = $PDO->orderServicePorID($id);
//$rows1 = $rwc1[0];
//$count1 = $rwc1[1];
$rwc2 = $PDO->orderServiceUserPorID($id);//buscaUser($rows1["user"]);
$rows2 = $rwc2[0];
$count2 = $rwc2[1];
$rwc3 = $PDO->buscaTecnLaudoPorID($id);
$rows3 = $rwc3[0];
$count3 = $rwc3[1];
//echo $count1;
//echo $id;
/*
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

$sql3 = "SELECT nome, datahora, status, laudo FROM tecnico WHERE idos=:id order by datahora desc";
$stmt3 = $PDO->prepare($sql3);
$stmt3->bindParam(":id", $id, PDO::PARAM_INT);
$stmt3->execute();
$result3 = $stmt3->rowCount();
if($result3 > 0){
  $rows3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
}
*/
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Ver Ordem de Serviço</title>
    <script src="js/animation.js"></script>
    <link rel="stylesheet" href="stylesheet/screen.css">
  </head>
  <body>
    <header>
    </header>
    <section>
      <form action="incluir_laudo.php" method="post" id=form_os>
        <fieldset id="os">
          <legend>Ver Ordem de Serviço</legend>
          <fieldset id="prot">
            <legend>Protocolo</legend>
            <span id="nos"><? echo $rows2["nos"]; ?></span>
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
                  <? echo $rows2["descr"]; ?>
                </div>
              </fieldset>
            </div>
          </div>
          <fieldset id="laudo"><!-- esconder tag hidden="true" -->
            <legend>Laudo</legend>
            <div id="div_laudo">
              <input type="hidden" name="idos" value="<? echo $id; ?>" />
              <div id="div_laudo1">
                <textarea id="text_laudo" name="laudo" rows="5" cols="68" form="form_os" placeholder="Escreva Seu Laudo Aqui!"></textarea>
              </div>
              Selecione o status :
              <select name="status" required>
                <option value=""></option>
                <option value="CANCE">Canceladas</option>
                <option value="ANDA">Andamento</option>
                <option value="MATE">Em Espera de Material</option>
                <option value="CONT">EM Espera de Contado</option>
                <option value="ENCE">Encerrada</option>
              </select>
              <div id="bot">
                <div id="bot2">
                  <button type="button" onclick="closeScreen()">Cancelar</button>
                </div>
                <div id="bot1">
                  <button type="submit">Confirmar</button>
                </div>
              </div>
            </div>
          </fieldset>
        </fieldset>
        <fieldset id="laudos">
          <legend>Laudos Anteriores</legend>
          <div id="div_laudos">
          <?
            foreach ($rows3 as $key => $value) {
              if($value["status"] != "NOVA"){
                echo "<div id=\"ant_laudo\">";
                echo "<fieldset><legend>Laudo</legend>";
                echo "<fieldset><legend>Dados Técnico</legend>";
                echo "<div style=\"display:inline-block;margin-right: 3px;\">Tecnico : $value[nome] //</div>";
                $data = new DateTime($value["datahora"]);
                echo "<div style=\"display:inline-block;margin-right: 3px;\">Data : " . $data->format('d-m-Y') . " //</div>";
                echo "<div style=\"display:inline-block\">Hora : " . $data->format('H:i:s') . "</div></fieldset>";
                  echo "  <fieldset><div>$value[laudo]</div></fielset></fieldset></fieldset>";
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
