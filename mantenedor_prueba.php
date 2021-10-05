<!DOCTYPE html>
<html>

	 <head>
		 <title>Ejemplo</title>
		 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		 <link href="estilo.css" rel="stylesheet">
		 <script src="jquery/jquery-3.5.1.min.js"type="text/javascript"></script>
		 <script src="bootstrap/js/bootstrap.min.js"></script>
		
	 </head>
	 	 
	 	 <script type="text/javascript">
		 	  $(function(){
	        $("#BotonParaEsconder").click(function(){
	        $( ".panel_error" ).toggle();
	        });
	    	});

	 	 </script>
	 <body>

			<button id="BotonParaEsconder" type="submit">Siguiente </button>
			<div class="panel_error">por favor ocultame</div>

	 </body>		
</html>
