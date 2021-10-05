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
		     $(document).ready(function()
		     	 {	     	 		     	 			     	 		
				     $("#btnIngresar").click(function()
						 {
				     		 email_var=$("#inputEmail").val();
				             pass_var=$("#inputPassword").val();

				     		 $.post("mantenedor_post_insert.php",
					     	 	 {
							 		 email: email_var,
							 		 pass: pass_var
					     		 },
						 	 function(data,status)
						 	 	 {							
							 	     alert("Data: " + data + "\nStatus: " + status);
							 	     location.reload();								 
						 	     });
						 });
					 $("#btnUpdate").click(function()
						 {
				     		 id_upd = $("#inputId").val();
				     		 email_upd = $("#inputCorreo").val();
				             pass_upd = $("#inputPass").val();
				             
				              $.post("mantenedor_post_update.php",
					     	 	 {
							 		 id: id_upd,
							 		 email: email_upd,
							 		 pass: pass_upd
					     		 },
						 	 function(data,status)
						 	 	 {							
							 	     alert("Data: " + data + "\nStatus: " + status);	
							 	     location.reload();								 
     					 	     });					 	    			     		 
						 });	
					 $("#BotonParaEsconder").click(function()
        			  	 {
        			 		 $("#contenedora").toggle();
        		     	 });
        		     $("#BotonParaMostrar").click(function()
    			 	  	 {
    			 	 	 	 $("#contenedora").fadeToggle();
    			 		 });				
				 });
		 </script>

		 <script type="text/javascript">

		 	 function man_eliminar(str) 
		 	 	 {
			     	 id_id = str;
			 		 alerta = str;
			 		 $.post("mantenedor_post_delete.php",
				 		 {
					 		 id_id_id: id_id,
					 		 pass: alerta
				 		 },		 
				 	 function(data,status)
				 	     {
					         alert("Data: " + data + "\nStatus: " + status);
					         location.reload(); 
				         });
			 		 
				 }
			 function man_actualizar(str,strid) 
		 	 	 {
			     	 var_id = str;
			     	 var_contrasena =strid;
					 $("#inputId").val(var_id);			        
				 }
		 </script>
	 <body>
		 <div class="jumbotron">
			 <div class="container">
			 	 <a href="javascript:location.reload()">Actualizar página</a>
				 <h1 class="display-3">Mantenedor </h1>

				 <a class="btn btn-warning" href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_insertar">Insert</a>
				 <a class="btn btn-warning" href="mantenedor_insert.php" role="button">Insert</a>

				 <a class="btn btn-primary" href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_select">Select</a>
				 <a class="btn btn-primary" href="mantenedor_user.php" role="button">Select</a>

				 <a class="btn btn-danger" href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_eliminar">Delete</a>
				 <a class="btn btn-danger" href="#" role="button">Delete</a>	

				 <button type="button" class="btn btn-success" id="BotonParaMostrar" >Success</button>
				 <a id="BotonParaMostrar" class="btn btn-success" class="btn btn-primary btn-lg" role="button">Update</a>
				 <a id="BotonParaEsconder" class="btn btn-success" role="button">Update</a>				 
			 </div>	 	 
			 <div id="contenedora" class="container">			 	 	 	 
			 	 <h6 class="display-4">Actualizar </h6>
			 	 <?php

			 	 	 require_once('conectar.php');
					 $datas = array();
			 		 if ($conn->connect_error) 
			 		 	 {
			 			     die("Connection failed: " . $conn->connect_error);
			 		     }
			 		 $sql="SELECT id, correo, contrasena FROM usuario;";
			 		 $result = $conn->query($sql);
			 		 if ($result->num_rows > 0) 
			 		 	 {			 			 	
			 			     while($row = $result->fetch_assoc()) 
			 			     	 {
							 	 	 $datas[] = $row;			 			     	
			 			         }			 			   
			 			 }
			 		 else
			 			 {
			 				 $resError="Contrasena incorrecta, email desconocido";
			 				 echo $resError;
			 			 }				    
				 ?>
			 	 <table class="table">
					  <thead>

					     <tr>
					       <th scope="col">#</th>
					       <th scope="col">Id</th>
					       <th scope="col">Correo</th>
					       <th scope="col">Update</th>
					     </tr>
					  </thead>
					  
					  <tbody>

					  	 <?php 
					  		 foreach ($datas as $data) 
				     	     	 {
				     	 ?>
					    <tr>
					      <th scope="row">1</th>
					      <td><?php echo $data['id'] ; ?></td>
					      <td><?php echo $data['correo'] ;?></td>
					      <td><a class="btn btn-success" href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_update" onclick="man_actualizar('<?php echo $data['id'] ; ?>','<?php echo $data['correo'] ;?>')">Update</a></td>
					    </tr>
					      <?php 
					      	     }
						  ?>

					  </tbody>

				 </table>
			 </div>
	     </div>
		 <!-- Modal Insertar  -->
		 <div class="modal fade" id="modal_insertar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		     <div class="modal-dialog" role="document">
		         <div class="modal-content">
		             <!--
		                 <div class="modal-header">
		             		 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		             		 <h4 class="modal-title" id="myModalLabel">Modal title</h4>
		                 </div>
		              -->
		             <div class="modal-body">
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
		       		 </div>
			         <!--
			             <div class="modal-footer">
			                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                 <button type="button" class="btn btn-primary">Save changes</button>
			             </div>
			         -->
		         </div>
		     </div>
		 </div>
		 <!-- Modal Insertar -->
		 <!-- Modal Select  -->
		 <div class="modal fade" id="modal_select" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			 <div class="modal-dialog" role="document">
				 <div class="modal-content">
					 <div class="modal-body">

						 <?php	 					 			
							 	 print_r($datas);
				 			     $conn->close();
				 		  ?>

					 </div>
				 </div>
			 </div>
		 </div>
		 <!-- Modal Select-->
		 <!-- Modal Eliminar  -->
		 <div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			 <div class="modal-dialog" role="document">
				 <div class="modal-content">
					 <div class="modal-body">				         				 
						 <?php

						     //	print_r($datas);
						     foreach ($datas as $data) {

							 $iddd = 	$data['id'];

							 echo $data['id'] ;
							 echo '</br>';
							 echo $data['correo'] ;
							 echo '</br>' ;

						 ?>
							 <div class="form-check mb-3">
							     <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
							     <label class="form-check-label" for="validationFormCheck1">Check this checkbox</label>
							     <div class="invalid-feedback">Example invalid feedback text</div>
							     <button type="button" class="btn btn-danger" onclick="man_eliminar('<?php echo $iddd; ?>')">Eliminar</button>
							 </div>
	 					 <?php	

							 }
						 ?>
					 </div>
				 </div>
			 </div>
		 </div>
		 <!-- Modal Eliminar-->
		 <!-- Modal Update  -->
		 <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		     <div class="modal-dialog" role="document">
		         <div class="modal-content">
		             <div class="modal-body">
					     <div class="container">
						     <form class="form-signin">
							     <!--  <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
							     <h1 class="h3 mb-3 font-weight-normal">Actualizar Usuario</h1>
							     <input type="identifica" id="inputId" class="form-control" placeholder="Identifica" >
							     <label for="inputEmail" class="sr-only">Email </label>
							     <input type="email" id="inputCorreo" class="form-control" placeholder="Email"  autofocus>
							     <br>
							     <label for="inputPassword" class="sr-only">Password</label>
							     <input type="password" id="inputPass" class="form-control" placeholder="Password" >
							     <br>							     
							     <button class="btn btn-lg btn-primary btn-block" type="submit" id="btnUpdate">Actualizar</button>							     
						     </form>
					     </div>
					 </div>
		         </div>
		     </div>
		 </div>
		 <!-- Modal Update -->
	 </body>		
</html>
