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
$sql = "select id, nome, email, telefone, setor, sala, coord, ala from usuario where user=?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $user);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

$nos = $row["id"]."/".$dt->format('YmdHis');
$dh = $dt->format('d/m/Y H:i');

?>

<!DOCTYPE html>
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
    <section>
      <form method="post">
        <fieldset>
          <legend>Ordem de Serviço</legend>
          <p><label for="nos">Número de OS : </label>
          <input id="nos" type="text" name="nos" value="<?php echo $nos; ?>" required/></p>
          <p><label for="nome">Solicitante : </label>
          <input id="nome" type="text" name="nome" value="<?php echo $row["nome"]; ?>" required/></p>
          <p><label for="email">Email : </label>
            <input id="email"  type="text" name="email" value="<?php echo $row["email"]; ?>" required/></p>
          <p><label for="coord">Coordenação : </label>
          <input id="coord" type="text" name="coord" value="<?php echo $row["coord"]; ?>" required/></p>
          <p><label for="ala">Ala : </label>
          <input id="ala" type="text" name="ala" value="<?php echo $row["ala"]; ?>" required/></p>
          <p><label for="sala">Sala : </label>
          <input id="sala" type="text" name="sala" value="<?php echo $row["sala"]; ?>" required/></p>
          <p><label for="telefone">Telefone : </label>
          <input id="telefone" type="tel" name="telefone" value="<?php echo $row['telefone']; ?>" required/></p>
          <label for="dh">Data e Hora : </label>
          <input id="dh" type="text" name="dh" value="<?php echo $dh; ?>" required/>
        </fieldset>
        <br/>
        <fieldset>
          <legend>Descrição do pedido</legend>
          <textarea id="desc" cols="30" rows="10"></textarea><br/><br/>
          <button type="submit">Confirmar</button>
          <button type="submit">Cancelar</button>
        </fieldset>

    </section>

  </body>
</html>
