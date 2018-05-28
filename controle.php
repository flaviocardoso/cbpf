<?php
$nome = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = entrada($_POST["nome"]);
}
function entrada($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1 maxium-scale=1" name="viewport">
        <title>Controle</title>
    </head>
    <body>
        <header>
            <p>Controle</p>
        </header>
        <section>
            Nome : <?php echo $nome; ?>
            <form action="formulario.php" method="post">
                <input type="hidden" name="nome" value="<?php echo $nome; ?>"/>
                <input type="submit" value="Formulário"/>
            </form>            
        </section>
    </body>
</html>