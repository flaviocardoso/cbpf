$("#form_data").submit(function(e)
{
  e.preventDefault();
  var formData = new FormData($(this)[0]);
  //formData.append("hander", <? echo $_POST['hander']; ?>));
  $.ajax({
    url: "coordOS",
    type: "POST",
    data: formData,
    success: function(response)
    {
      $('#content').html(response);
    },
    error: function(xhr, status, error)
    {
      alert(xhr.responseText);
    },
    async: false,
    cache: false,
    contentType: false,
    processData: false
  });
});
$("#form_coord").submit(function(e)
{
  e.preventDefault();
  var formData = new FormData($(this)[0]);
  //formData.append("hander", <? echo $_POST['hander']; ?>));
  $.ajax({
    url: ,
    type: "POST",
    data: formData,
    success: function(response)
    {
      $('#content').html(response);
    },
    error: function(xhr, status, error)
    {
      alert(xhr.responseText);
    },
    async: false,
    cache: false,
    contentType: false,
    processData: false
  });
});
