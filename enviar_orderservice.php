<?php
include("conexao.php");
include("biblio.php");

session_start();
$user = $_SESSION["user"];

$nome = entrada($_POST["nome"]);
$email = entrada($_POST["email"]);
$coord = entrada($_POST["coord"]);
$ala = entrada($_POST["ala"]);
$sala = entrada($_POST["sala"]);
$telefone = entrada($_POST["telefone"]);
$setor = entrada($_POST["setor"]);
$descr = entrada($_POST["descr"]);

$dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
$nos = $coord."/".$dt->format('YmdHis');
$dh = $dt->format('Y-m-d H:i:s');

//$arquivos = $_POST["nos"];
//$nos = $_POST["nos"];

$sql = "INSERT INTO orderservice (idos, user, nos, nome, email, coord, ala, sala, telefone, setor, datahora, descr) VALUES (NULL, :user, :nos, :nome, :email, :coord, :ala, :sala, :telefone, :setor, :datahora, :descr)";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':user', $user, PDO::PARAM_STR);
$stmt->bindParam(':nos', $nos, PDO::PARAM_STR);
$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':coord', $coord, PDO::PARAM_STR);
$stmt->bindParam(':ala', $ala, PDO::PARAM_STR);
$stmt->bindParam(':sala', $sala, PDO::PARAM_STR);
$stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
$stmt->bindParam(':setor', $setor, PDO::PARAM_STR);
$stmt->bindParam(':datahora', $dh, PDO::PARAM_STR);
$stmt->bindParam(':descr', $descr, PDO::PARAM_STR);

$stmt->execute();

$result = $stmt->rowCount();

if($result > 0){
  header("Location: solicitante_orderservices.php");
}else{
  header("Location: criar_orderservice.php?user=$user&coord=$coord&descr=$descr&setor=$setor&dh=$dh&telefone=$telefone&sala=$sala");
}

?>
