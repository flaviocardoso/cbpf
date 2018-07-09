var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
$routeProvider
//.when("/criarOS", {templateUrl : "criarOS"})
.when("/coordOS", {templateUrl : "coordOS"})
.when("/setorOS", {templateUrl : "setorOS"})
.when("/solicOS", {templateUrl : "solicOS"})
.when("/tecnOS", {templateUrl : "tecnOS"});
});
//criarOS
$('li#criarOS').click(function(e) {
  e.preventDefault();
  $.post( "criarOS", {hander: "criarOS"})
  .done(function( resp ) {
    $('#content').html(resp);
  });
  return false;
});
//coordOS
$('li#coordOS').click(function(e) {
  e.preventDefault();
  $.post( "coordOS", {hander: "coordOS"})
  .done(function( resp ) {
    $('#content').html(resp);
  });
  return false;
});
//setorOS
$('li#setorOS').click(function(e) {
  e.preventDefault();
  $.post( "setorOS", {hander: "setorOS"})
  .done(function( resp ) {
    $('#content').html(resp);
  });
  return false;
});
//solicOS
$('li#solicOS').click(function(e) {
  e.preventDefault();
  $.post( "solicOS", {hander: "solicOS"})
  .done(function( resp ) {
    $('#content').html(resp);
  });
  return false;
});
//tecnOS
$('li#tecnOS').click(function(e) {
  e.preventDefault();
  $.post( "tecnOS", {hander: "tecnOS"})
  .done(function( resp ) {
    $('#content').html(resp);
  });
  return false;
});
