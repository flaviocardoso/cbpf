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

$coord = $_SESSION["coord"];

$mensErroArq = "";
$mensErro = "";
$mensOS = "";
//echo "string1";
//post isset não funcionando!!!
//echo $_POST['submit'];
if(!empty($_POST['submit']))
{
  //echo "string2";
  $user = entrada($_POST["user"]);
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
  }
  include_once("config/maining/path/OrderService.php");
  $OS = new ClassOS();
  $OS->user = $user;
  $OS->nos = $nos;
  $OS->nome = $nome;
  $OS->email = $email;
  $OS->coord = $coord;
  $OS->ala = $ala;
  $OS->sala = $sala;
  $OS->telefone = $telefone;
  $OS->setor = $setor;
  $OS->arq_name = $arq_name;
  $OS->arq = $arq;
  $OS->arq_type = $arq_type;
  $OS->dh = $dh;
  $OS->descr = $descr;

  include("config/maining/path/CN.php");
  $PDO = new CN();
  $rwci1 = $PDO->inserirOS($OS);
  $rowsi1 = $rwci1[0];
  $counti1 = $rwci1[1];

  if($counti1 > 0)
  {
    $rwci2 = $PDO->orderServicePorNOS($OS);
    $rowsi2 = $rwci2[0];
    $counti2 = $rwci2[1];

    if($counti2 > 0)
    {
      include_once("config/maining/path/Tecnico.php");
      $Tec = new ClassTecnico();
      $Tec->idos = $rowsi2["idos"];
      $Tec->setor = $setor;
      $Tec->status = "NOVA";

      $rwci3 = $PDO->inserirTecnNOVAOS($Tec);
      $counti3 = $rwci3[0];
      if($counti3 > 0){
        //header("Location: criarOS");
        include_once("config/maining/path/email.php");
        //email de teste
        $solic_email = "flavioc401@gmail.com";
        $solic_name = "Flavio Cardoso";
        $assunto = "Service OS CBPF";
        $mensOS = "Ordem de Serviço Criada!";
        $mens = "<p><b>" . stmpmailer($_SESSION['email'], $_SESSION['nome'], $solic_email, $solic_name, $assunto, $mensOS) . "</b></p>";
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

include_once("config/maining/path/CN.php");
$PDO = new CN();
$rwcsetor = $PDO->buscarSetorPorCoord($coord);
$rowsSetor = $rwcsetor[0];
$countSetor = $rwcsetor[1];
//echo $coord;


if(!empty($_POST["setorSubmit"])){
  //echo $_POST["setorSubmit"];
  $solicSetor = $_POST["setorSolic"];
  $rwcusers = $PDO->buscarUserPorSetor($solicSetor);
  $rowsUsers = $rwcusers[0];
  $countUsers = $rwcusers[1];
}

if(!empty($_POST["userSubmit"])){
  //echo $_POST["userSubmit"];
  //echo $_POST["userSolic"];
  $mens = "";
  $rows1 = array();
  $count = 0;
  if(isset($_POST["userSolic"]) and !empty($_POST["userSolic"]))
  {
    include_once("config/maining/path/CN.php");
    $PDO = new CN();
    $rwc = $PDO->consultaUser($_POST["userSolic"]);
    $rows1 = $rwc[0];
    $count = $rwc[1];
    if($count == 0)
    {
      $mens = "<p>Não encontrado</p>";
    }
  }
}
?>
<? echo $mensErroArq; ?>
<? echo $mensErro; ?>
<? echo $mensOS; ?>
<form id="solicitSever" method="post" action="principal">
  <fieldset>
    <legend>Incluir solicitante</legend>
    Incluir setor :
    <select name="setorSolic" id="setorSolic">
      <option value=""></option>
      <?
        foreach ($rowsSetor as $key => $value) {
          if(!empty($_POST["setorSolic"]) && ($_POST["setorSolic"] == $value["setor"]) ) {
            echo "<option value='$value[setor]' selected>" . setor($value["setor"]) . "</option>";
          }else{
            echo "<option value='$value[setor]' >" . setor($value["setor"]) . "</option>";
          }
        }
      ?>
    </section>
    <input type="submit" name="setorSubmit" value="Procurar usuários"/><br/><br/>
    Incluir usuario :
    <select name="userSolic" id="userSolic">
      <option value=""></option>
      <?
        foreach ($rowsUsers as $key => $value) {
          echo "<option value='$value[user]' >" . $value["user"] . "</option>";
        }
      ?>
    </section>
    <input type="submit" name="userSubmit" value="Inserir usuario"/>
  </fieldset>
</form>
<br>
<form id="form_os" method="post" action="principal">
  <fieldset>
    <legend>Criando Ordem de Serviço</legend>
    <fieldset>
      <legend>Dados do solicitante</legend>
        <fieldset>
          <legend>Solicitante</legend>
          <input id="user" type="hidden" name="user" value="<?php if(isset($rows1["user"])) {echo $rows1["user"];} ?>" required/>
          <input id="nome" type="text" name="nome" value="<?php if(isset($rows1["nome"])) {echo $rows1["nome"];} ?>" required/>
        </fieldset>
        <fieldset>
          <legend>Email</legend>
          <input id="email"  type="text" name="email" value="<?php if(isset($rows1["email"])) {echo $rows1["email"];} ?>" required/>
        </fieldset>
        <fieldset>
          <legend>Coordenação</legend>
          <input id="coord" type="text" name="coord" value="<?php if(isset($rows1["coord"])) {echo $rows1["coord"];} ?>" required/>
        </fieldset>
        <fieldset>
          <legend>Ala</legend>
          <input id="ala" type="text" name="ala" value="<?php if(isset($rows1["ala"])) {echo $rows1["ala"];} ?>" required/>
        </fieldset>
        <fieldset>
          <legend>Sala</legend>
          <input id="sala" type="text" name="sala" value="<?php if(isset($rows1["sala"])) {echo $rows1["sala"];} ?>" required/>
        </fieldset>
        <fieldset>
          <legend>Telefone</legend>
          <input id="telefone" type="tel" name="telefone" value="<?php if(isset($rows1['telefone'])) {echo $rows1['telefone'];} ?>" required/>
        </fieldset>
        <fieldset>
          <legend>Setor de destinação</legend>
          <select name="setor" id="setoros" required>
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
          <textarea id="descros" name="descr" cols="30" rows="10" form="form_os" required></textarea><br/><br/>
          <input type="submit" id="submit" name="submit" form="form_os" value="Enviar"/>
        </fieldset>
      </fieldset>
    </fieldset>
</form>
<script>
  $('#form_os').submit(function(e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    const submit = $('input[name="submit"]').val();
    formData.append("submit", submit);
    $.ajax({
        url: 'criarOS', // caminho para o script que vai processar os dados
        type: 'POST',
        data: formData,
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
  $('#solicitSever').submit(function(e)
  {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    const setorSubmit = $('input[name="setorSubmit"]').val();
    const userSubmit = $('input[name="userSubmit"]').val();
    formData.append("setorSubmit", setorSubmit);
    formData.append("userSubmit", setorSubmit);
    $.ajax({
      url: 'criarOS', // caminho para o script que vai processar os dados
      type: 'POST',
      data: formData,
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
  });
</script>
