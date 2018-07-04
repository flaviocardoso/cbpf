<?php
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}

include("conexao.php");
include("biblio.php");

//session_start();
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
  $sql1 = "SELECT idos FROM orderservice WHERE nos=:nos";
  $stmt1 = $PDO->prepare($sql1);
  $stmt1->bindParam(':nos', $nos, PDO::PARAM_STR);
  $stmt1->execute();

  $result1 = $stmt1->rowCount();

  if($result1 > 0){
    $status = "NOVA";
    $row = $stmt1->fetch(PDO::FETCH_ASSOC);
    $idos1 =  $row["idos"];

/*
    $sql2 = "INSERT INTO tecnico(idtecn, idos, nome, user, setor, datahora, status, laudo) VALUES(NULL, :idos, NULL, NULL, :setor, :datahora, :status, NULL)";
    $stmt2 = $PDO->prepare($sql2);
    $stmt2->bindParam(':idos', $idos1, PDO::PARAM_INT);
    $stmt2->bindParam(':setor', $setor, PDO::PARAM_STR);
    $stmt2->bindParam(':datahora', $dh, PDO::PARAM_STR);
    $stmt2->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt2->execute();
    $result2 = $stmt2->rowCount();
*/

    if($result2 > 0){
      header("Location: principal#!/solicOS");
    }else{
      header("Location: principal#!/criarOS");
    }

  }else{
    header("Location: principal#!/criarOS");
  }
}else{
  header("Location: principal#!/criarOS");
}

?>
