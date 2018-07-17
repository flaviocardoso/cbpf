<?php
// exemplo de código para controle de página em que existe sessão
  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['user'])) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: login"); exit;
  }
  $perm_usua = 1;
  $perm_coor = 2;
  $perm_admin = 3;
  $perm_adminS = 4;
  $nivel = $_SESSION["nivel"];
  $linperfil = "<p><a href=\"perfil.php\">Alterar perfils de sua cooordenação</a></p>";
  $linkcriar = "<p><a href=\"criar_orderservice.php\">Criar Ordem de Servico</a></p>";
  $linkcoordS = "<p><a href=\"coord_orderservice.php\">Ver Ordens de Servicos da Coordenação</a></p>";
  $linksetorS = "<p><a href=\"orderserviceporsetor.php\">Ver Ordens de Serviço</a></p>";
  $linksolS = "<p><a href=\"solicitante_orderservices.php\">Ver Suas Solicitações de Servico</a></p>";
  $linktecS = "<p><a href=\"tecnico_orderservices.php\">Ver Serviços prestados</a></p>";
  $linkLogout = "<p><a href=\"logout\">Logout</a></p>";
  include("config/maining/path/biblio.php");
  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width initial-scale=1 maximum-scale=1" name="viewport">
        <title>Página principal</title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/vue.js"></script>
        <style>
          .dropdown-content { display: none; position: absolute; background-color: #f9f9f9; min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); padding: 12px 16px; z-index: 1; text-align: center;}
          #descr:hover .dropdown-content {display: block; }
          #laudo:hover .dropdown-content {display: block; }
          #nav .dropdown-content {display: block; }
          body {margin: 0px;}
          section {display: flex;}
          nav {margin-left: 8px; position: fixed;}
          article {margin-left: 275px; -webkit-flex: 5; -ms-flex-glow: 5; flex: : 5;}
          footer {text-align: center; bottom: 0; position: relative;}
          ul { list-style-type: none; padding-left: 0px; width: 250px; margin-right: 16px; margin-top: 0px;}
          li{ cursor: pointer; padding-top: 10px; padding-bottom: 10px; border: 1px solid black; border-radius: 10px;
    text-align: center; margin-bottom: 3px;}
          li:hover {background: yellow;}
          /*#content {height: 490px;}*/
          #pesquisa {border: 1px solid black; border-radius: 3px;}
          #dados {overflow-x: auto;}
          #boxdata {border: 2px solid black; border-radius: 4px; margin-bottom: 3px;}
          #boxtodo {display: flex;}
          #boxnos {display: flex;}
          #nos {padding-bottom: 2px; padding-top: 2px;text-align: center; border-right: 2px solid black;flex: 5;}
          #setor {padding-bottom: 2px; padding-top: 2px;text-align: center; border-right: 2px solid black;flex: 5;}
          #status {padding-bottom: 2px; padding-top: 2px;text-align: center; flex: 1;}
          #boxsolic {border-top: 2px solid black;flex: 5;}
          #solic {text-align: center; border-right: 2px solid black;}
          #tecn {text-align: center; border-right: 2px solid black;}
          #boxtecn {border-top: 2px solid black; flex: 5}
          #box-acesso {border-top: 2px solid black;flex: 1}
          #boxdate {display: flex;}
          #data-os {text-align: center; border-top: 1px solid black; border-right: 1px solid black;flex: 1;}
          #hora-os {text-align: center; border-top: 1px solid black; border-right: 2px solid black; flex: 1;}
          #descr {text-align: center; border-top: 1px solid black; border-right: 2px solid black;}
          #laudo {text-align: center; border-top: 1px solid black; border-right: 2px solid black;}
          #id-edit {text-align: center;}
          #id-arquivo {text-align: center;}
          #id-acess {text-align: center;}
          /*footer {border: 1px solid black; position: relative;bottom: 0px;}*/
        </style>
    </head>
    <body>
      <header>
        <p>Bem vindo, <? echo $_SESSION["nome"];?></p>
        <? echo $linkLogout; ?>
      </header>
      <section>
          <nav>
            <ul>
              <li id="asrecoord">Gerenciar Coordenadores</li>
              <li id="yehdusers">Gerenciar Usuários</li>
              <li id="criarOS">Criar Ordens de serviços</li>
              <li id="coordOS">Ver OS na coordenação</li>
              <li id="setorOS">Ver OS no setor</li>
              <li id="solicOS">Ver suas solicitações de OS</li>
              <li id="tecnOS">Ver OS Consultadas</li>
            </ul>
          </nav>
          <article>
            <div id="content"></div>
          </article>

          <!--<p>
            <a href="criarOS" target="_blank">Criar Ordem de Serviço</a><br>
            <a href="#!coordOS">Ordem de serviços por Coordenação</a><br>
            <a href="#!setorOS">Ordem de serviço por setor</a><br>
            <a href="#!solicOS">Ordem de serviço por solicitadas</a><br>
            <a href="#!tecnOS">Ordem de serviço atendidos</a><br>
            <button type="button" id="criarOS">Criar OS</button>
            <button type="button" id="coordOS">Coordenação OS</button>
            <button type="button" id="setorOS">Setor OS</button>
            <button type="button" id="solicOS">Solicitações OS</button>
            <button type="button" id="tecnOS">Tecnico OS</button>-->

      </section>
      <!--<footer>
        <p>Pé da página</p>
      </footer>-->
      <script src="js/form3.js"></script>
      <script>
        //gerenciar coordenadores #admin$ entrada suprimida para a página
        $('li#asrecoord').click(function(e) {
          e.preventDefault();
          $.post( "adminmainger", {hander: "adminmainger"})
          .done(function( resp ) {
            $('#content').html(resp);
          });
          return false;
        });
        //gerenciar usuarios por coordenação #coord$ entrada suprimida para a página
        $('li#yehdusers').click(function(e) {
          e.preventDefault();
          $.post( "coordmainger", {hander: "coordmainger"})
          .done(function( resp ) {
            $('#content').html(resp);
          });
          return false;
        });
      </script>
    </body>
</html>
