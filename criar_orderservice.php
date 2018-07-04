<?php

if (!isset($_SESSION)) session_start();
$user = $_SESSION['user'];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
$mensErroArq = "";
$mensErro = "";
$mensOS = "";
echo "string1";
//post isset não funcionando!!!
if(isset($_POST["submit"]))
{
  echo "string2";
  $nome = entrada($_POST["nome"]);
  $email = entrada($_POST["email"]);
  $coord = entrada($_POST["coord"]);
  $ala = entrada($_POST["ala"]);
  $sala = entrada($_POST["sala"]);
  $telefone = entrada($_POST["telefone"]);
  $setor = entrada($_POST["setor"]);
  $descr = entrada($_POST["descr"]);

  $dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
  $nos = $coord."/".$dt->format('YmdHis');
  $dh = $dt->format('Y-m-d H:i:s');

  if(!empty($_FILES['arq']))
  {
  $path = '/opt/lampp/htdocs/cbpf/conec/data/uploads/';
  //$dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
  $forderdh = $dt->format('Y/m/d/H/i/s/');

  $path = $path . $forderdh;
  $arq_name = $path . $_FILES['arq']['name'];
  $_SESSION["arq_name"] = $arq_name;
  $_SESSION["forders"] = $forderdh;

  }
  else
  {
    $mensErroArq = "<p>Erro de Arquivo</p>";
  }
  include("config/maining/path/CN.php");
  $PDO = new CN();
  $rwci1 = $PDO->inserirOS($user, $nos, $nome, $email, $coord, $ala, $sala, $telefone, $setor, $arq, $dh, $descr);
  $rowsi1 = $rwci1[0];
  $counti1 = $rwci1[1];

  if($counti1 > 0)
  {
    $rwci2 = $PDO->orderServicePorNOS($nos);
    $rowsi2 = $rwci2[0];
    $counti2 = $rwci2[1];

    if($counti2 > 0)
    {
      $status = "NOVA";
      $rwci3 = $PDO->inserirTecnNOVAOS($rowsi2["id"], $setor, $dh, $status);
      $counti3 = $rwci3[0];
      if($counti3 > 0){
        header("Location: conec/data/uploads.php");
        $mensOS = "Ordem de Serviço Criada!";
      }else{
        $mensErro = "<p>rwci3 erro!</p>";
      }

    }else{
      $mensErro = "<p>rwci2 erro!</p>";
    }
  }else{
    $mensErro = "<p>rwci1 erro</p>";
  }
}

include_once("config/maining/path/biblio.php");
$mens = "";
$rows1 = array();
$count = 0;
if(isset($user) and !empty($user))
{
  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->consultaUser($user);
  $rows1 = $rwc[0];
  $count = $rwc[1];
  if($count == 0)
  {
    $mens = "<p>Não encontrado</p>";
  }
}
/*
$sql = "select id, nome, email, telefone, setor, sala, coord, ala from usuario where user=:user";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(":user", $user. PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
*/
?>

<!--<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Criar ordem de serviço</title>

  </head>
  <body>
    <header>
      <p>Criando a ordem de serviço</p>
    </header>
    <section>-->
    <? echo $mensErroArq; ?>
    <? echo $mensErro; ?>
    <? echo $mensOS; ?>
    <? echo $mens; ?>
      <form id="form_os" method="post" action="principal#!/criarOS" enctype="multipart/form-data">
        <fieldset>
          <legend>Criando Ordem de Serviço</legend>
          <!--<fieldset>
            <legend>Número de OS</legend>
            <input id="nos" type="text" name="nos" value="<?php echo $nos; ?>" required/>
          </fieldset>
          <br/>-->
          <fieldset>
            <legend>Dados do solicitante</legend>
            <fieldset>
              <legend>Solicitante</legend>
              <input id="nome" type="text" name="nome" value="<?php echo $rows1["nome"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Email</legend>
              <input id="email"  type="text" name="email" value="<?php echo $rows1["email"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Coordenação</legend>
              <input id="coord" type="text" name="coord" value="<?php echo $rows1["coord"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Ala</legend>
              <input id="ala" type="text" name="ala" value="<?php echo $rows1["ala"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Sala</legend>
              <input id="sala" type="text" name="sala" value="<?php echo $rows1["sala"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Telefone</legend>
              <input id="telefone" type="tel" name="telefone" value="<?php echo $rows1['telefone']; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Setor de destinação</legend>
              <select name="setor">
                <option value=""></option>
                <option value="comp">Computação</option>
                <option value="elet">Eletrônica</option>
                <option value="meca">Mecânica</option>
                <option value="marc">Marcearia</option>
                <option value="vidr">Vidro</option>
                <option value="webi">Web Institucional</option>
                <option value="segu">Segurança de Rede</option>
              </select>
          </fieldset>
          <fieldset>
              <legend>Arquivos</legend>
              <input type="file" name="arq"/>
          </fieldset>
          <br/>
          <fieldset>
            <legend>Descrição do serviço</legend>
            <textarea id="descr" name="descr" cols="30" rows="10" form="form_os"></textarea><br/><br/>
            <input type="submit" name="submit"/>Confirmar</button>
            <!--<button type="submit" formaction="cancelar_orderservice.php">Cancelar</button>-->
          </fieldset>
        </fieldset>

      </form>
    <!--</section-->

  </body>
</html>
