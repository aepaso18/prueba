<!DOCTYPE html>
<html>
<head>
<script src="jquery/jquery-3.5.1.min.js"type="text/javascript"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.post("pruebaPostfinal.php",
    {
      name: "Donald Duck",
      city: "Duckburg"
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>
</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body>
</html>
 