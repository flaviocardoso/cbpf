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
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/vue.js"></script>

    </head>
    <body ng-app="myApp">
        <header>
            <p>Bem vindo, <? echo $_SESSION["nome"]; ?>!</p>
            <?
            //if($nivel < 3)
            //{
            echo $linperfil;
            echo $linkcriar;
            echo $linkcoordS;
            //
            //}
            //else
            //{
            echo $linksetorS;
            echo $linksolS;
            echo $linktecS;
            //}

            echo $linkLogout;
            ?>
        </header>
        <section>
          <p>
            <a href="criarOS" target="_blank">Criar Ordem de Serviço</a><br>
            <a href="#!coordOS">Ordem de serviços por Coordenação</a><br>
            <a href="#!setorOS">Ordem de serviço por setor</a><br>
            <a href="#!solicOS">Ordem de serviço por solicitadas</a><br>
            <a href="#!tecnOS">Ordem de serviço atendidos</a><br>
            <button type="button" id="button1">Aperte1</button>
            <button type="button" id="button2">Aperte2</button>
          </p>
            <div ng-view></div>
            <div id="content"></div>
        </section>
        <script>
          var app = angular.module("myApp", ["ngRoute"]);
          app.config(function($routeProvider) {
          $routeProvider
          //.when("/criarOS", {templateUrl : "criarOS"})
          .when("/coordOS", {templateUrl : "coordOS"})
          .when("/setorOS", {templateUrl : "setorOS"})
          .when("/solicOS", {templateUrl : "solicOS"})
          .when("/tecnOS", {templateUrl : "tecnOS"});
          });
          $('#button1').click(function(e) {
            e.preventDefault();
            //const nome = $('input[name="nome"]').val();
            //const email = $('input[name="email"]').val();
            //const assunto = $('input[name="assunto"]').val();
            //const mensagem = $('textarea[name="mensagem"]').val();
            $.ajax({
                url: 'criarOS', // caminho para o script que vai processar os dados
                success: function(response) {
                    $('#content').html(response);
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
            return false;
          });
          $('#button2').click(function(e) {
            e.preventDefault();
            //const nome = $('input[name="nome"]').val();
            //const email = $('input[name="email"]').val();
            //const assunto = $('input[name="assunto"]').val();
            //const mensagem = $('textarea[name="mensagem"]').val();
            $.ajax({
                url: 'coordOS ', // caminho para o script que vai processar os dados
                success: function(response) {
                    $('#content').html(response);
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
            return false;
          });
        </script>
    </body>
</html>
