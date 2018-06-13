<?php
include("conexao.php");
include("biblio.php");

session_start();
$user = $_SESSION["user"];

$nos = $_POST["nos"];
$nome = $_POST["nos"];
$email = $_POST["nos"];
$coord = $_POST["nos"];
$ala = $_POST["nos"];
$sala = $_POST["nos"];
$telefone = $_POST["nos"];
$setor = $_POST["setor"];
$dh = $_POST["nos"];
$desc = $_POST["nos"];
//$arquivos = $_POST["nos"];
//$nos = $_POST["nos"];

$sql = "INSERT INTO orderservice (user, nos, nome, email, coord, ala, sala, telefone, setor, datahora, desc) VALUES (:user, :nos, :nome, :email, :coord, :ala, :sala, :telefone, :setor, :datahora, :desc)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(":user", $user, PDO::PARAM_STR);
$stmt->bindParam(":nos", $user, PDO::PARAM_STR);
$stmt->bindParam(":email", $user, PDO::PARAM_STR);
$stmt->bindParam(":coord", $user, PDO::PARAM_STR);
$stmt->bindParam(":ala", $user, PDO::PARAM_STR);
$stmt->bindParam(":sala", $user, PDO::PARAM_STR);
$stmt->bindParam(":telefone", $user, PDO::PARAM_STR);
$stmt->bindParam(":setor", $setor, PDO::PARAM_STR);
$stmt->bindParam(":datahora", $user, PDO::PARAM_STR);
$stmt->bindParam(":desc", $user, PDO::PARAM_STR);
$stmt->bindParam(":user", $user, PDO::PARAM_STR);

$stmt->execute();

$result = $stmt->rowCount();

if($result > 0){
  header("Location: solicitante_orderservices.php");
}else{
  header("Location: criar_orderservice.php?error=1");
}

?>
