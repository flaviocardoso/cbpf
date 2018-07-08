
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
//session_start();
$arq_name = $_GET["arq_name"];//$_SESSION['arq_name'];
$arq_tmp = $_GET["arq_tmp"];//$_SESSION['arq_tmp'];
$forders = $_GET["forder"];//$_SESSION['forders'];
$path = '/opt/lampp/htdocs/cbpf/conec/data/uploads/';
if(isset($arq_name))
{
  if(!is_dir("$forders"))
  {
    mkdir("$forders", 0777, true);
  }
  if(move_uploaded_file($arq_tmp, $path . $forders . $arq_name))
  {
    header("Location: principal#!/coordOS");
    print "Arquivo " . basename($_FILES['arq']['name']) . " foi guardado";
  }
  else {
    print "erro";
  }
}
else
{
  print "sem arquivo";
}



?>
