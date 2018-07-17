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
