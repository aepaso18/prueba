<!DOCTYPE html>
<html>
	 <head>
		<title>Ejemplo</title>
		 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		 <script src="jquery/jquery-3.5.1.min.js"type="text/javascript"></script>
		 <script src="bootstrap/js/bootstrap.min.js"></script>
		 <link href="estilo.css" rel="stylesheet">
	 </head>
	 <body>
		 <div class="container">
		 	 <form class="form-signin">
		 		 <!--  <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
		 		 <h1 class="h3 mb-3 font-weight-normal">Ingresar Usuario</h1>
		 		 <label for="inputEmail" class="sr-only">Email </label>
		 		 <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
		 		 <br>
		 		 <label for="inputPassword" class="sr-only">Password</label>
		 		 <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		 		 <br>
		 		 <div class="checkbox mb-3">
		 			<label>
		 				<input type="checkbox" value="remember-me"> Recuerdame
		 			</label>
		 		</div>
		 		<button class="btn btn-lg btn-primary btn-block" type="submit" id="btnIngresar">Ingresar</button>
		 		<!-- <p class="mt-5 mb-3 text-muted">&copy; 2020-2020</p>-->
		 	 </form>
		 </div>
	 </body>
	 <script>
	 	$(document).ready(function(){
	 		$("#btnIngresar").click(function(){

	 			email_var=$("#inputEmail").val();
	 			pass_var=$("#inputPassword").val();

	 			 $.post("mantenedor_post_insert.php",
	 				{
	 					email: email_var,
	 					pass: pass_var
	 				},
	 				function(data,status){
	 					alert("Data: " + data + "\nStatus: " + status);
	 				});
	 		});
	 	});
	 </script>
</html>
