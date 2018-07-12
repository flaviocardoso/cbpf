<?php
if (!isset($_SESSION)) session_start();
$coord = $_SESSION["coord"];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user']) and !isset($coord)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
include_once("config/maining/path/biblio.php");

$anoinicial = NULL;
$mesinicial = NULL;
$diainicial = NULL;

if(isset($_POST["submit"]))
{
  echo $anoinicial = (int) entrada($_POST["anoinicial"]);
  $mesinicial = entrada($_POST["mesinicial"]);
  $diainicial = entrada($_POST["diainicial"]);
}

include_once("config/maining/path/biblio.php");
$mens = "";
$rows1 = array();
if(isset($coord) and !empty($coord))
{
  include_once("config/maining/path/Consultas.php");
  $CON = new ClassConsulta();
  $CON->anoinicial = $anoinicial;
  $CON->mesinicial = $mesinicial;
  $CON->diainicial = $diainicial;

  include_once("config/maining/path/OrderService.php");
  $OS = new ClassOS();
  $OS->coord = $coord;

  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->orderServicePorCoord($OS, $CON);
  $rows1 = $rwc[0];
  $count= $rwc[1];
  if($count == 0)
  {
    $mens = "<p>Não encontrado!</p>";
  }
}
if(isset($_POST["nome"]))
{
  echo entrada($_POST["nome"]);
}
echo $_POST["hander"];
?>

<!--<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <title>Coordenação Ordem de Serviços</title>
  </head>
  <body>
    <header>
      <p>Seus Pedidos</p>
    </header>
    <section>-->
      <? $mens ?>
      <form id="form_data" action="principal" method="post">
        <input
        Data de Abertura da OS :
        <input type="number" name="diainicial" placeholder="DIA"/>
        <input type="number" name="mesinicial" placeholder="MES"/>
        <input type="number" name="anoinicial" placeholder="ANO"/><br>
        <input type="submit" id="submit" name="submit" value="Enviar"/>
      </form>
      <p></p>
        <?php
          //print_r($rows1);
          if($count > 0)
          {
            foreach ($rows1 as $key => $value) {
              //print_r($value);//ex.: $value['id']
              echo "$value[descr]<br>";
              echo "$value[data]<br>";
              echo "$value[hora]<br>";
              echo "$value[laudo]<br>";
              echo "$value[data_ultima]<br>";
              echo "$value[hora_ultima]<br>";
              if($value["arquivo"])
              {
                echo "<a href=\"os/arquivo/$value[id]\" target=\"__blank__\">Arquivo</a><br>";
              }
              echo "<a href=\"os/$value[id]\" target=\"__blank__\">Acessar</a><br>";
            }
          }
        ?>
    </div>
    <script>
    $("#form_data").submit(function(e)
    {
      e.preventDefault();
      var formData = new FormData($(this)[0]);
      formData.append("hander", "<? if(isset($_POST['hander'])) echo $_POST['hander']; ?>");
      formData.append("submit", $('input[name="submit"]').val());
      $.ajax({
        url: "<? if(isset($_POST['hander'])) echo $_POST['hander']; ?>",
        type: "POST",
        data: formData,
        success: function(response)
        {
          $('#content').html(response);
        },
        error: function(xhr, status, error)
        {
          alert(xhr.responseText);
        },
        async: false,
        cache: false,
        contentType: false,
        processData: false
      });
      return false;
    });
    </script>
<!--
  </body>
</html>-->
