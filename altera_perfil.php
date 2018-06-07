<?php
include("conexao.php");
include("biblio.php");
session_start();
$user = $_SESSION['user'];
$nome = entrada($_POST['nome']);
$email = entrada($_POST['email']);
$telefone = entrada($_POST['telefone']);
$setor = entrada($_POST['setor']);
$sala = entrada($_POST['sala']);
$coord = entrada($_POST['coord']);
$ala = entrada($_POST['ala']);

$sql = "UPDATE usuario SET nome=:nome, email=:email, telefone=:telefone, setor=:setor, sala=:sala, coord=:coord, ala=:ala WHERE user=:user";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
$stmt->bindParam(':setor', $setor, PDO::PARAM_STR);
$stmt->bindParam(':sala', $sala, PDO::PARAM_STR);
$stmt->bindParam(':coord', $coord, PDO::PARAM_STR);
$stmt->bindParam(':ala', $ala, PDO::PARAM_STR);
$stmt->bindParam(':user', $user, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->rowCount();

if($result > 0){
  echo "Atualização com sucesso!!;";
  header("Location:perfil.php");exit;
}
header("Location:perfil.php?error=1");exit;
$stmt->close();
?>
