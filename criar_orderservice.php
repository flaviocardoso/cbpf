<?php

if (!isset($_SESSION)) session_start();
$user = $_SESSION['user'];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login"); exit;
}
include_once("config/maining/path/biblio.php");
//var_dump($_FILES);

$mensErroArq = "";
$mensErro = "";
$mensOS = "";
//echo "string1";
//post isset não funcionando!!!
//echo $_POST['submit'];
if(!empty($_POST['submit']))
{
  //echo "string2";
  $nome = entrada($_POST["nome"]);
  $email = entrada($_POST["email"]);
  $coord = entrada($_POST["coord"]);
  $ala = entrada($_POST["ala"]);
  $sala = entrada($_POST["sala"]);
  $telefone = entrada($_POST["telefone"]);
  $setor = entrada($_POST["setor"]);
  $descr = entrada($_POST["descr"]);
  $_POST["submit"] = "";
  $dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
  $nos = $coord."/".$dt->format('YmdHis');
  $dh = $dt->format('Y-m-d H:i:s');
  $arq = "";
  $arq_name = "";
  $arq_type = "";
  //var_dump($_FILES);

  if(!empty($_FILES['arquivo']["name"]))
  {
    //pega caminho principal
    $path_root = $_SERVER["DOCUMENT_ROOT"];
    $path = "/cbpf/conec/data/uploads/";
    //'/opt/lampp/htdocs/cbpf/conec/data/uploads/';
    //$dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
    $forder = $dt->format('Y/m/d/H/i/s/');
    $arq_name = $_FILES["arquivo"]["name"];
    $arq_tmp = $_FILES["arquivo"]["tmp_name"];
    $arq_type = $_FILES["arquivo"]["type"];
    if(!is_dir("{$path_root}{$path}{$forder}"))
    {
      mkdir("{$path_root}{$path}{$forder}", 0777, true);
    }
    if(move_uploaded_file($arq_tmp, $path_root . $path . $forder . $arq_name))
    {
      $arq = $path_root . $path . $forder . $arq_name;
      //echo $arq;
    }
    else
    {
      echo "Don't file upload";
      var_dump($_FILES["arquivo"]);
      exit;
    }
  //$forder = $forderdh;
  //$path = $path . $forderdh;
  //$arq = $path . $_FILES['arquivo']['name'];
  //$_SESSION["arq_name"] = $arq;
  //$_SESSION["arq_tmp"] = $_FILES['arquivo']['tmp_name'];
  //$_SESSION["forders"] = $forderdh;
  }
  include("config/maining/path/CN.php");
  $PDO = new CN();
  $rwci1 = $PDO->inserirOS($user, $nos, $nome, $email, $coord, $ala, $sala, $telefone, $setor, $arq_name, $arq, $arq_type, $dh, $descr);
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
      $rwci3 = $PDO->inserirTecnNOVAOS($rowsi2["idos"], $setor, $dh, $status);
      $counti3 = $rwci3[0];
      if($counti3 > 0){
        //header("Location: criarOS");
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
//var_dump($_POST);
//var_dump($_FILES);
?>
<!--
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Criar ordem de serviço</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>
    <header>
      <p>Criando a ordem de serviço</p>
    </header>-->
    <? echo $mensErroArq; ?>
    <? echo $mensErro; ?>
    <? echo $mensOS; ?>
    <? echo $mens; ?>
    <? //echo $_FILES["arquivo"]["name"]; ?>
      <form id="form_os" method="post" action="principal">
        <fieldset>
          <legend>Criando Ordem de Serviço</legend>
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
              <select name="setor" id="setor" required>
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
            <legend>Enviar arquivo</legend>
            <input type="file" name="arquivo" id="arquivo"/>
          </fieldset>
          <fieldset>
            <legend>Descrição do serviço</legend>
            <textarea id="descr" name="descr" cols="30" rows="10" form="form_os" required></textarea><br/><br/>
            <input type="submit" id="submit" name="submit" form="form_os" value="Enviar"/>
            <!--<button type="submit" formaction="cancelar_orderservice.php">Cancelar</button>-->
          </fieldset>
        </fieldset>
      </fieldset>
      </form>
      <script>
      $('#form_os').submit(function(e) {
        e.preventDefault();
        //const nome = $('input[name="nome"]').val();
        //const email = $('#email').val();
        //const coord = $('#coord').val();
        //const ala = $('#ala').val();
        //const sala = $('#sala').val();
        //const telefone = $('#telefone').val();
        //const setor = $('#setor').val();
        //const arquivo = $('#arquivo').val();
        //{submit: submit, nome: nome, email: email, coord: coord, ala: ala, sala: sala, telefone: telefone, setor: setor, descr: descr},
        var formData = new FormData($(this)[0]);
        //const descr = $('#descr').val();
        const submit = $('input[name="submit"]').val();
        formData.append("submit", submit);
        //var formData = new FormData(this);
        $.ajax({
            url: 'criarOS', // caminho para o script que vai processar os dados
            type: 'POST',
            data: formData,
            //contentType: false,
            //processData: false,
            //data: {submit: submit, nome: nome, email: email, coord: coord, ala: ala, sala: sala, arquivo: arquivo, telefone: telefone, setor: setor, descr: descr},

            success: function(response) {
                $('#content').html(response);
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
      });
      </script>
<!--  </body>
</html>-->
