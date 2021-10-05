 <?php
     require_once('conectar.php');
	 // Check connection Verificar Conexion
	 if ($conn->connect_error) 
	     {
             die("Connection failed: " . $conn->connect_error);
	     }
	 //echo "Connected successfully";
	 $Varid_id_id= $_POST["id_id_id"];
	 $VarPass= $_POST["pass"];
	 $sql="DELETE FROM usuario WHERE id = '$Varid_id_id' ;";
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
 ?>
