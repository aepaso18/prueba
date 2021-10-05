 <?php
	 
	 require_once('conectar.php');
	 // Check connection Verificar Conexion
	 if ($conn->connect_error) 
	     {
	 	 	 die("Connection failed: " . $conn->connect_error);
		 }
	 //echo "Connected successfully";
	 $VarEmail= $_POST["email"];
	 $VarPass= $_POST["pass"];

	 $sql="INSERT INTO usuario (correo , contrasena) VALUES ('$VarEmail','$VarPass');";
	 //$result = $conn->query($sql);

	 if ($conn->query($sql) === TRUE) 
	     {
     		 $resCorrect = "ingresado";
		 } 
	 else 
	     {
	  		 $resCorrect = "Error: " . $sql . "<br>" . $conn->error;
		 }		 
	 echo $resCorrect;
	 $conn->close();
	 /* 
	     $resCorrect="Encontrado con exito";
	     echo $resCorrect;
	         } 
	     else 
	         {
		         $resError="Contrasena incorrecta, email desconocido";
			     echo $resError;
			 }
	     $conn->close();
	 */
?>
