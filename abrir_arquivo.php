<?
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['user'])) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: login.php"); exit;
}
$id = $_GET["id"];

include_once("config/maining/path/CN.php");
$PDO = new CN();
$rwc = $PDO->buscaArquivoPorID($id);
$row = $rwc[0];
$count = $rwc[1];
//echo $id;
//echo $count;
//echo $row["arquivo"];
header('Content-type: ' . $row["arqtype"]);
header('Content-Disposition: inline; filename="' . $row["arqname"] . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($row["arquivo"]));
header('Accept-Ranges: bytes');

@readfile($row["arquivo"]);

?>
<html>
<head>
<title><? if($row["arquivo"]) echo $row["arqname"]; ?></title>
</head>
</html>
