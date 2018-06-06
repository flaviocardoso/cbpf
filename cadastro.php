<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1 maximum-scale=1" name="viewport">
        <title>Cadrastro - Teste de nível de permissões - Inclusão no banco de dados</title>
    </head>
    <body>
        <header>
            <p align="center">Cadastro - Teste de nível de premissões - Inclusão no banco de dados</p>
        </header>
        <section>
            <div align="center">
                <p>
                  <?php
                  $dt = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
                  echo $dt->format('Y-m-d H:i:s');
                  ?>
                </p>
                <p>

                </p>
                <form action="inserir.php" method="post">
                <div>
                    <table>
                        <tr>
                            <td align="right">Nome : </td>
                            <td><input name="nome" type="text" placeholder="Digite seu nome" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Usuário : </td>
                            <td><input name="user" type="text" placeholder="Digite o nome do usuário" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Email : </td>
                            <td><input name="email" type="email" placeholder="Digite seu email" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Telefone : </td>
                            <td><input name="telefone" type="tel" placeholder="Digite seu telefone" required /></td>
                        </tr>
                        <tr>
                            <td align="right">Setor : </td>
                            <td>
                                <select name="setor">
                                    <option value=""></option>
                                    <option value="comp">Computação</option>
                                    <option value="elet">Eletrônica</option>
                                    <option value="meca">Mecânica</option>
                                    <option value="marc">Marcearia</option>
                                    <option value="vidr">Vidro</option>
                                    <option value="webi">Web Institucional</option>
                                    <option value="segu">Segurança de Rede</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td><td></td>
                        </tr>
                        <tr>
                            <td align="right">Senha : </td>
                            <td><input name="senha" type="password" placeholder="Digite sua Senha" required/></td>
                        </tr>
                        <tr>
                            <td align="right">Repita a Senha : </td>
                            <td><input name="c_senha" type="password" placeholder="Repita a senha" required /></td>
                        </tr>
                        <tr>
                            <td></td><td><p><a href="http://localhost:8080/cbpf/login.php">Já tem login?</a></p></td>
                        </tr>
                    </table>
                    <br/>
                    <input type="submit" name="submit" value="Enviar"/>
                    <input type="reset" value="Limpar"/>
                </div>
                </form>
            </div>
        </section>
    </body>
</html>
