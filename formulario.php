<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1 maxium-scale=1" name="viewport">
        <title>Formulário</title>
    </head>
    <body>
        <header>
            <p>Formulário</p>
            <?php
                if(isset($_POST["nome"]) && !empty($_POST["nome"])){
                    echo "<p>Bem vindo : ";
                    echo $_POST["nome"];
                    echo "</p>";
                    unset($_POST['nome']);
            ?>
        </header>
        <section>
            <?php
                }else{
                    echo "<form action=\"controle.php\" method=\"post\">";
                    echo "Nome : <input name=\"nome\" type=\"text\" value=\"\"/>";
                    echo "<br/><br/>";
                    echo "<input type=\"submit\" name=\"submit\" value=\"Enviar\"/>";
                    echo "</form>";
                }
               
            ?>
            <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                Nome : <input name="nome" type="text" value=""/>
                <br/>
                <br/>
                <input type="submit" name="submit" value="Enviar"/>
            </form> -->
        </section>
    </body>
</html>