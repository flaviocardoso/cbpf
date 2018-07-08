var submit = document.getElementById("submit");

submit.onclick = function(e)
{
  var setor = document.getElementById('setor').value;
  var descr = ducument.getElementById('descr').value;
  if (setor == "" & descr == "")
  {
    alert("Preencha setor e descrição");
  }else if (setor == "")
  {
    alert("Preencha setor");
  }else if (descr == "")
  {
    alert("Preencha descrição")
  }
  else
  {
    alert("Ordem de Serviço enviada com sucesso!");
    document.getElementById('setor').value = "";
    document.getElementById('descr').value = "";
  }
  e.preventDefault();
}
