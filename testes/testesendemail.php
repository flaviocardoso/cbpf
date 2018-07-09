<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

$from = "flavioc41@gmail.com";

$to = "flavioc401@gmail.com";

$subject = "Verificando o correio do PHP";

$message = "O correio do PHP funciona bem";

$headers = "De:". $from;

mail($to, $subject, $message, $headers);

echo "A mensagem de e-mail foi enviada.";

?>
