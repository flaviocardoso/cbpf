<?php
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user']) or $_SESSION['nivel'] != 1) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}

echo "<p>Aqui é a página do adminstrador</p>";
echo "<p>Não é permitidor usuários comuns!</p>";
?>
