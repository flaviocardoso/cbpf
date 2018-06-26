<?php
include("conexao.php");
$idos = $_POST["idos"];
$status = $_POST["status"];
$laudo = $_POST["laudo"];

session_start();
$user = $_SESSION["user"];
$nome = $_SESSION["nome"];
$setor = $_SESSION["setor"];

//echo $idos;
//echo $laudo;
$dt = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
$dh = $dt->format('Y-m-d H:i:s');

$sql1 = "INSERT INTO tecnico(idtecn, idos, nome, user, setor, datahora, status, laudo) VALUES(NULL, :idos, :nome, :user, :setor, :datahora, :status, :laudo)";
$stmt1 = $PDO->prepare($sql1);
$stmt1->bindParam(":idos", $idos, PDO::PARAM_INT);
$stmt1->bindParam(":nome", $nome, PDO::PARAM_STR);
$stmt1->bindParam(":user", $user, PDO::PARAM_STR);
$stmt1->bindParam(":setor", $setor, PDO::PARAM_STR);
$stmt1->bindParam(":datahora", $dh, PDO::PARAM_STR);
$stmt1->bindParam(":status", $status, PDO::PARAM_STR);
$stmt1->bindParam(":laudo", $laudo, PDO::PARAM_STR);
$stmt1->execute();
$result1 = $stmt1->rowCount();
if($result1 > 0){
  header("Location: ver_os.php?id=$idos");exit;
}

?>
