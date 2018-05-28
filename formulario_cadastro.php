<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <title>Formulário de cadastro</title>
</head>
<body>
    <header>
        <p>Cadrastro</p>
    </header>
    <section>
        <form name="cadrastro" method="post" action="cadrastrar.php">
            Login: <input name="usuario" type="text" id="usuario" value="<?php echo $usuario; ?>"/><br/>
            Senha <input name="senha" type="text" id="senha" value="<?php echo $senha; ?>"/><br/>
            Confirmação de senha: <input name="c_senha" type="text" id="c_senha" value="<?php echo $c_senha; ?>"/><br/>
            Nome: <input name="nome" type="text" id="nome" value="<?php echo $nome; ?>"/><br/>
            Email <input name="email" type="text" id="email" value="<?php echo $email; ?>"/><br/>
            Telefone: <input name="telefone" type="text" id="telefone" value="<?php echo $telefone; ?>"/><br/>
            Ramal: <input name="ramal" type="text" id="ramal" value="<?php echo $ramal; ?>"/><br/><br/>
            <input type="submit" name="submit" id="enviar" value="Enviar"/><br/>
            <input type="reset" value="Limpar"/>
        </form>
    </section>
    <footer>
        <p></p>
    </footer>
</body>
