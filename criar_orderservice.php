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
include("biblio.php");
include("conexao.php");
$sql = "select id, nome, email, telefone, setor, sala, coord, ala from usuario where user=:user";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(":user", $user. PDO::PARAM_STR);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
      <form id="form_os" method="post">
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
              <input id="nome" type="text" name="nome" value="<?php echo $row["nome"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Email</legend>
              <input id="email"  type="text" name="email" value="<?php echo $row["email"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Coordenação</legend>
              <input id="coord" type="text" name="coord" value="<?php echo $row["coord"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Ala</legend>
              <input id="ala" type="text" name="ala" value="<?php echo $row["ala"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Sala</legend>
              <input id="sala" type="text" name="sala" value="<?php echo $row["sala"]; ?>" required/>
            </fieldset>
            <fieldset>
              <legend>Telefone</legend>
              <input id="telefone" type="tel" name="telefone" value="<?php echo $row['telefone']; ?>" required/>
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
              <input type="file" name="arquivo[]" multiple/>
          </fieldset>
          <br/>
          <fieldset>
            <legend>Descrição do serviço</legend>
            <textarea id="descr" name="descr" cols="30" rows="10" form="form_os"></textarea><br/><br/>
            <button type="submit" formaction="enviar_orderservice.php">Confirmar</button>
            <!--<button type="submit" formaction="cancelar_orderservice.php">Cancelar</button>-->
          </fieldset>
        </fieldset>

      </form>
    <!--</section-->

  </body>
</html>
