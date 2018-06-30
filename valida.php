<?php
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
$user = $_POST["user"];
$senha = $_POST["senha"];
$setor = $_POST["setor"];

//session_start();
$_SESSION["user"] = $user;
$_SESSION["setor"] = $setor;
header("Location:principal.php");exit;
?>
