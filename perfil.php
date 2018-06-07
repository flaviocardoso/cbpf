<?php

if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}

$user = $_SESSION['user'];

include("biblio.php");
include("conexao.php");
$sql = "select * from usuario where user=?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $user);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
    <tile>Perfil</title>
  </head>
  <body>
    <header>
      <p>Página de perfil : <?php echo $_SESSION["nome"]; ?></p>
    </header>
    <section>
      <div id="perfil">
        <p>Nome : <?php echo $row['nome'];?></p>
        <p>Email : <?php echo $row["email"]; ?></p>
        <p>Telefone : <?php echo $row["telefone"]; ?></p>
        <p>Setor : <?php echo setor($row["setor"]); ?></p>
        <p>Sala : </p>
        <p>Coordenação : </p>
        <button onclick="troca1();">Alterar</button>
      </div>
      <div id="perfil_alt" style="visibility:hidden;">
        <form action="altera_perfil.php" method="post">
          <table>
            <tr>
              <td>Nome : </td><td></td>
            </tr>
            <tr>
              <td>Email : </td><td></td>
            </tr>
            <tr>
              <td>Telefone : </td>
            </tr>
            <tr>
              <td>Setor</td><td></td>
            </tr>
            <tr>
              <td>Sala : </td><td></td>
            </tr>
            <tr>
              <td>Coordenação : </td><td></td>
            </tr>
          </table>
          <input type="submit" value="Enviar">
          <button onclick="troca2;">Cancelar</button>
        </form>

      </div>
      <script>
        //window.open("principal.php");
        function troca1() {
          //document.getElementById("perfil").style.visibility = "hidden";
          //document.getElementById("perfil_alt").style.visibility = "visible";
          var nome = prompt("Nome : ");
          var email = prompt("Email : ");
          var telefone = prompt("Telefone : ");
          var setor = prompt("Setor : ");
        }
        function troca2() {
          document.getElementById("perfil").style.visibility = "visible";
          document.getElementById("perfil_alt").style.visibility = "hidden";
        }
      </script>
      <p><a href="principal.php">Voltar para página inicial</a></p>
    </section><!-- fazer informa de mudança de informação pelo script -->
  </body>
</html>
