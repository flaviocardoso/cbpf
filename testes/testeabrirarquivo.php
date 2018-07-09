<?
//teste OK!!!!!
$id = 61;
$pathroot = $_SERVER["DOCUMENT_ROOT"];
include_once($pathroot. "/cbpf/config/maining/path/CN.php");
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
