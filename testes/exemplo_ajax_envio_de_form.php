<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<form id="contactform" method="post" action="sendemail.php">

        Nome: <input type="text" name="nome" /> </br>
        E-mail: <input type="text" name="email" /> </br>
        Assunto: <input type="text" name="assunto" /> </br>
        Menssagem: <textarea name="menssagem"></textarea>

        <input type="submit" value="Enviar Menssagem" />
       <div id="resp"></div>
</form>
<script>
$('#contactform').submit(function(e) {
  e.preventDefault();
  const nome = $('input[name="nome"]').val();
  const email = $('input[name="email"]').val();
  const assunto = $('input[name="assunto"]').val();
  const mensagem = $('textarea[name="mensagem"]').val();
  $.ajax({
      url: 'sendemail.php', // caminho para o script que vai processar os dados
      type: 'POST',
      data: {nome: nome, email: email, assunto: assunto, mensagem: mensagem},
      success: function(response) {
          $('#resp').html(response);
      },
      error: function(xhr, status, error) {
          alert(xhr.responseText);
      }
  });
  return false;
});
</script>
//sendemail.php
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$menssagem = $_POST['menssagem'];


?>

<?php

$to = "teste@gmail.com";
$subject = "$assunto";
$menssagem = "<strong>Nome:</strong> $nome<br /><br /><strong>E-mail:</strong>$email<br /><br /><strong>Assunto:</strong> $assunto<br /><br /><strong>Menssagem:</strong> $menssagem ";
$header = "MIME-Version: 1.0\n";
$header .= "Content-type: text/html; charset=iso-8859-1\n";
$header .= "From: $email\n";
mail($to, $subject, $menssagem,$header);
echo "Enviado!";

?>


</body>
</html>
