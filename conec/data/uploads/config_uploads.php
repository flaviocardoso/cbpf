
<?
/*
foreach ($_FILES['arquivo']['error'] as $key => $value) {
  if($value == UPLOAD_ERR_OK){
    $tmp_name = $_FILES['arquivo']['tmp_name'][$key];
    $name = $_FILES['arquivo']['name'][$key];
    move_uploaded_file($tmp_name, "$path$forderdh$name");
  }
}

header("Location: http://localhost:8080/cbpf/testes/teste_multfile.php");
}
*/
session_start();
$arq_name = $_SESSION['arq_name'];
$forders = $_SESSION['$forders'];
$path = '/opt/lampp/htdocs/cbpf/conec/data/uploads/';
if(!empty($_FILES['arq']))
{
  if(!is_dir("$forders"))
  {
    mkdir("$forders", 0777, true);
  }
}

if(move_uploaded_file($_FILES['arq']['tmp_name'], $path . $forders . $_FILES['arq']['name']))
{
  header("Location: principal#!/coordOS");
  print "Arquivo " . basename($_FILES['arq']['name']) . " foi guardado";
}
else {
  print "erro";
}


?>
