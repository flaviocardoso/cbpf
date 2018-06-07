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

$sql = "update link set nome=?, email=?, telefone=?, setor=?, sala=?, coord=?, ala=? where user=?";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $telefone);
$stmt->bindParam(4, setor_data($setor));
$stmt->bindParam(5, $sala);
$stmt->bindParam(6, $coord);
$stmt->bindParam(7, $ala);
$stmt->bindParam(8, $user);

$result = $stmt->rowCount();

if($result > 0){
  echo "Atualização com sucesso!!;";
}

?>
