<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?
  var_dump($_POST);
  if(isset($_POST["submit"]))
  {
    echo $_POST["d"];
  }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<form method="post" action="">
  <input name="e" id="e" type="text" value="tesre"/>
  <input name="d" id="d" type="text" name="d" value="tesfe"/>
  <input type="submit" id="submit" name="submit"/>
</form>

<script>
  var submit = document.getElementById("submit");
  //alert(document.getElementById("d").value);
  submit.onclick = function(e)
  {
    e.preventDefault();
    var tage = document.getElementById("e").value;
    var tagd = document.getElementById("d").value;
    if (tagd == "")
    {
      //alert("input não preenchido!");
    }
    else
    {
      //alert("sucesso");
      document.getElementById("d").value = "";
      document.getElementById("e").value = "";
    }
  }
  alert($("#d").val());
  /*$("#submit").click(function(e)){
    var d = $("#d").val();
    if (d == "")
    {
      alert("input não preenchido!")
    }
    e.preventDefault();
  }*/
</script>
