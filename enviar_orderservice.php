<?php
include("conexao.php");
include("biblio.php");

session_start();
$user = $_SESSION["user"];

$nos = $_POST["nos"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$coord = $_POST["coord"];
$ala = $_POST["ala"];
$sala = $_POST["sala"];
$telefone = $_POST["telefone"];
$setor = $_POST["setor"];
$dh = $_POST["dh"];
$desc = $_POST["desc"];
//$arquivos = $_POST["nos"];
//$nos = $_POST["nos"];

$sql = "INSERT INTO orderservice (user, nos, nome, email, coord, ala, sala, telefone, setor, datahora, desc) VALUES (:user, :nos, :nome, :email, :coord, :ala, :sala, :telefone, :setor, :datahora, :desc)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(":user", $user, PDO::PARAM_STR);
$stmt->bindParam(":nos", $nos, PDO::PARAM_STR);
$stmt->bindParam(":email", $email, PDO::PARAM_STR);
$stmt->bindParam(":coord", $coord, PDO::PARAM_STR);
$stmt->bindParam(":ala", $ala, PDO::PARAM_STR);
$stmt->bindParam(":sala", $sala, PDO::PARAM_STR);
$stmt->bindParam(":telefone", $telefone, PDO::PARAM_STR);
$stmt->bindParam(":setor", $setor, PDO::PARAM_STR);
$stmt->bindParam(":datahora", $dh, PDO::PARAM_STR);
$stmt->bindParam(":desc", $desc, PDO::PARAM_STR);

$stmt->execute();

$result = $stmt->rowCount();

if($result > 0){
  header("Location: solicitante_orderservices.php");
}else{
  header("Location: criar_orderservice.php?error=1");
}

?>
