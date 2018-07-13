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

include_once("config/maining/path/Consultas.php");
$CON = new ClassConsulta();

if(isset($_POST["submit"]))
{
  $CON->anoinicial = (!empty($_POST["anoinicial"])) ? entrada($_POST["anoinicial"]) : NULL;
  $CON->mesinicial = (!empty($_POST["mesinicial"])) ? entrada($_POST["mesinicial"]) : NULL;
  $CON->diainicial = (!empty($_POST["diainicial"])) ? entrada($_POST["diainicial"]) : NULL;
  $CON->anofinal = (!empty($_POST["anofinal"])) ? entrada($_POST["anofinal"]) : NULL;
  $CON->mesfinal = (!empty($_POST["mesfinal"])) ? entrada($_POST["mesfinal"]) : NULL;
  $CON->diafinal = (!empty($_POST["diafinal"])) ? entrada($_POST["diafinal"]) : NULL;
}

include_once("config/maining/path/biblio.php");
$mens = "";
$rows1 = array();
if(isset($coord) and !empty($coord))
{
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
        Data de Abertura da OS :
        <input type="number" name="diainicial" placeholder="DIA"/>
        <input type="number" name="mesinicial" placeholder="MES"/>
        <input type="number" name="anoinicial" placeholder="ANO"/><br>
        Data do Ultimo laudo na OS :
        <input type="number" name="diafinal" placeholder="DIA"/>
        <input type="number" name="mesfinal" placeholder="MES"/>
        <input type="number" name="anofinal" placeholder="ANO"/><br>
        <input type="submit" id="submit" name="submit" value="Enviar"/>
      </form>
      <p></p>
        <?php
          //print_r($rows1);
          if($count > 0)
          {
            foreach ($rows1 as $key => $value) {
              //print_r($value);//ex.: $value['id']
              echo "<br>------------------<br>";
              echo "Número de Os : $value[nos]<br>";
              echo "Solicitante : $value[solicitante]<br>";
              echo "Setor OS: " . setor($value["setor"]) . "<br>";
              //echo "Coordenação OS: $value[coord]<br>";
              echo "Descrição : $value[descr]<br>";
              echo "Data : $value[data]<br>";
              echo "Hora : $value[hora]<br>";
              echo "Tecnico Atual : $value[tecnico]<br>";
              echo "Laudo : $value[laudo]<br>";
              echo "Data Ultimo Laudo : $value[data_ultima]<br>";
              echo "Hora Ultimo Laudo : $value[hora_ultima]<br>";
              if($value["arquivo"])
              {
                echo "<a href=\"os/arquivo/$value[id]\" target=\"__blank__\">Arquivo</a><br>";
              }
              echo "<a href=\"os/$value[id]\" target=\"__blank__\">Acessar</a><br><br>------------------<br>";
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
