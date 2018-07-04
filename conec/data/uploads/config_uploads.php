
<?
if(!empty($_FILES['arquivo']))
{
$path = '/opt/lampp/htdocs/cbpf/conec/data/uploads/';
echo 0 . ")" . $path;
//$path = $path . basename($_FILES['arquivo']['name']);
$dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
$forderdh = $dt->format('Y/m/d/H/i/s/');
echo "<br>" . 1 .")". $forderdh;
echo "<br>" . "$path$forderdh";
if(!is_dir("$forderdh"))
{
  mkdir("$forderdh", 0777, true);
}


foreach ($_FILES['arquivo']['error'] as $key => $value) {
  if($value == UPLOAD_ERR_OK){
    $tmp_name = $_FILES['arquivo']['tmp_name'][$key];
    $name = $_FILES['arquivo']['name'][$key];
    move_uploaded_file($tmp_name, "$path$forderdh$name");
  }
}

header("Location: http://localhost:8080/cbpf/testes/teste_multfile.php");
}
/*
if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $path))
{
  echo "Arquivo " . basename($_FILES['arquivo']['name']) . " foi guardado";
}
else {
  echo "erro";
}
}
*/

?>
