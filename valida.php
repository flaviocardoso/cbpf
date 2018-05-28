<?php
$user = $_POST["user"];
$senha = $_POST["senha"];
$setor = $_POST["setor"];

session_start();
$_SESSION["user"] = $user;
$_SESSION["setor"] = $setor;
header("Location:principal.php");exit;
?>