<?php
include("conexao.php");
include("biblio.php");

$dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
$nome = entrada($_POST["nome"]);
$user = entrada($_POST["user"]);
$email = entrada($_POST["email"]);
$telefone = entrada($_POST["telefone"]);
$senha = entrada($_POST["senha"]);
$setor = entrada($_POST["setor"]);
$nivel = 3;
$ativo = 1;
$cadastro = $dt->format('Y-m-d H:i:s');

try{
  $sql_insert = "INSERT INTO usuario VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stm = $PDO->prepare($sql_insert);
  $stm->bindParam(1, $nome);
  $stm->bindParam(2, $user);
  $stm->bindParam(3, $email);
  $stm->bindParam(4, $telefone);
  $stm->bindParam(5, $senha);
  $stm->bindParam(6, $setor);
  $stm->bindParam(7, $nivel);
  $stm->bindParam(8, $ativo);
  $stm->bindParam(9, $cadastro);
  $stm->execute();

  $result = $stm->rowCount();

  if($result > 0){
    echo "<script>alert('Cadastro com sucesso!');</script>";
    session_start();
    $_SESSION["user"] = $user;
    $_SESSION["setor"] = setor($setor);
    header("Location: principal.php");exit;
  }else{
    echo "<script>alert('Falha de cadastro');</script>";
    header("Location: cadastro.php?err=$result");
  }

}catch(PDOException $e){
  echo "ERROR: " . $e->getMessage();
}
?>
