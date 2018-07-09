<?
var_dump($_FILES);
?>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<form id="arquivo" enctype="multipart/form-data" method="post" action="">
  Adicone arquivos : <input type="file" name="arquivo">
  <input type="submit" name="submit"/>
</form>
<div id="content"></div>
</body>
</html>
