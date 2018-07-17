<?php
if (!isset($_SESSION)) session_start();
$user = $_SESSION["user"];
$setor = $_SESSION["setor"];
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
include("config/maining/path/biblio.php");
$mens = "";
$rows1 = array();
$count = 0;
if(isset($setor) and !empty($setor))
{
  include_once("config/maining/path/OrderService.php");
  $OS = new ClassOS();
  $OS->user = $user;
  $OS->setor = $setor;

  include_once("config/maining/path/CN.php");
  $PDO = new CN();
  $rwc = $PDO->orderServicePorTec($OS);
  $rows1 = $rwc[0];
  $count = $rwc[1];
  if($count == 0)
  {
    $mens = "Não encontrado!";
  }
}
/*
$sql1 = "SELECT os.idos as id, os.nos as nos, os.nome as solicitante, os.descr as descr, os.setor as setor, date_format(os.datahora, '%d/%m/%Y') as data, TIME(os.datahora) as hora, te.nome as tecnico, date_format(te.datahora, '%d/%m/%Y') as data_ultima, TIME(te.datahora) as hora_ultima, te.status as status, te.laudo as laudo FROM orderservice os JOIN (SELECT idos, nome, user, setor, datahora, status, laudo FROM tecnico group by idos desc) te using(idos) WHERE te.user=:user and te.setor=:setor";

$stmt1 = $PDO->prepare($sql1);
$stmt1->bindParam(":user", $user, PDO::PARAM_STR);
$stmt1->bindParam(":setor", $setor, PDO::PARAM_STR);
$stmt1->execute();
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
//print_r($rows1);
*/
if(isset($_POST["nome"]))
{
  echo entrada($_POST["nome"]);
}
echo $_POST["hander"];
?>
<? $mens; ?>
<form id="form_data" action="principal" method="post">
  <input type="text" name="nome" id="nome"/>
  <input type="submit" id="submit" name="submit" value="Enviar"/>
</form>
<div id="dados">
        <?php
        if($count > 0)
        {
          foreach ($rows1 as $key => $value) {
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
  </body>
</html>
