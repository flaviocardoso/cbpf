<?php
include("setor_procura.php");
// exemplo de código para controle de página em que existe sessão   
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();
   
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['user'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: login.php"); exit;
  }   
  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width initial-scale=1 maxium-scale=1" name="viewport">
        <title>Página principal</title>
    </head>
    <body>
        <header>
            <p>Bem vindo : <?php echo $_SESSION["user"]; ?></p>
            <?php 
            if(isset($_SESSION["setor"]) && !empty($_SESSION["setor"])){
                echo "<p>Setor : " . setor($_SESSION["setor"]) . "</p>";
            }
            ?>
            <p><a href="logout.php">Logout</a></p>
        </header>
    </body>
</html>