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
//echo $_POST["hander"];
?>
<? $mens ?>
<div id="pesquisa">
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
</div>
<p></p>
<div id="dados">
  <?php
    //print_r($rows1);
    if($count > 0)
    {
      foreach ($rows1 as $key => $value)
      {
        //print_r($value);//ex.: $value['id']
        echo "<div id='boxdata'>";
        echo "  <div id='boxnos'>";
        echo "    <div id='nos' title='Número de Ordem de Serviço'>" . $value["nos"] . "</div>";
        echo "    <div id='setor' title='Setor da Ordem de Serviço'>" . setor($value["setor"]) . "</div>";
        echo "    <div id='status' title='Status da Ordem de Serviço'>" . verStatus($value["status"]) . "</div>";
        echo "  </div>";
        echo "  <div id='boxtodo'>";
        echo "    <div id='boxsolic'>";
        echo "      <div id='solic' title='Solicitante'>" . $value["solicitante"] . "</div>";
        //echo "Coordenação OS: $value[coord]<br>";
        echo "      <div id='boxdate'>";
        echo "         <div id='data-os' title='Data de criação da Ordem de Serviço'>" . $value["data"] . "</div>";
        echo "         <div id='hora-os' title='Hora  de criação da Ordem de Serviço'>" . $value["hora"] . "</div>";
        echo "      </div>";
        //echo "      <div id='descr' title='Descrição da Ordem de Serviço'>" . $value["descr"] . "</div>";
        echo "      <div id='descr'><span>Descrição (Passe o Mouve)</span>";
        echo "        <div class='dropdown-content' title='Descrição da Ordem de Serviço'>" . $value["descr"] . "</div>";
        echo "      </div>";
        echo "    </div>";
        echo "    <div id='boxtecn'>";
        if($value["tecnico"])
        {
          echo "      <div id='tecn' title='Tecnico no momento'>" . $value["tecnico"] . "</div>";
        }else {
          echo "      <div id='tecn' title='Tecnico no momento'>Sem Tecnico</div>";
        }

        if($value["data_ultima"])
        {
          echo "      <div id='boxdate'>";
          echo "         <div id='data-os' title='Data do último laudo'>" . $value["data_ultima"] . "</div>";
          echo "         <div id='hora-os' title='Hora do último laudo'>" . $value["hora_ultima"] . "</div>";
          echo "      </div>";
        }else {
          echo "      <div id='boxdate'>";
          echo "         <div id='data-os' title='Data do último laudo'>Sem Data</div>";
          echo "         <div id='hora-os' title='Hora do último laudo'>Sem Hora</div>";
          echo "      </div>";
        }
        if($value["laudo"])
        {
          //echo "      <div id='laudo' title='Laudo'>" . $value["laudo"] . "</div>";
          echo "      <div id='laudo'><span>Laudo (Passe o Mouve)</span>";
          echo "        <div class='dropdown-content' title='Laudo da Ordem de Serviço'>" . $value["laudo"] . "</div>";
          echo "      </div>";
        }else {
          //echo "      <div id='laudo' title='Laudo'>Sem Laudo </div>";
          echo "      <div id='laudo'><span>Laudo (Passe o Mouve)</span>";
          echo "        <div class='dropdown-content' title='Laudo da Ordem de Serviço'>Sem Laudo</div>";
          echo "      </div>";
        }
        echo "   </div>";
        echo "   <div id='box-acesso'>";
        if($value["arquivo"])
        {
          echo "      <div id='id-arquivo'>";
          echo "         <a href=\"os/arquivo/$value[id]\" target=\"__blank__\">Arquivo</a>";
          echo "      </div>";
        }
        echo "      <div id='id-acess'>";
        echo "         <a href=\"os/$value[id]\" target=\"__blank__\">Acessar</a>";
        echo "      </div>";
        echo "      <div id='id-edit'>";
        echo "        ";
        echo "      </div>";
        echo "   </div>";
        echo " </div>";
        echo "</div>";
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
