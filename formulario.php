<!DOCTYPE html> 
<meta charset="UTF-8">
<?php  
$con = mysqli_connect("localhost","root","","crud") or die("conexion exitosa!");
?>
<html> 	
		<head>
			<meta chrset="UTF-8">
			<title>CRUD PHP & MySQL</title> 
			<link rel="stylesheet" href="estilos.css">
			<link rel="stylesheet" href="tabla.css">
			
		</head>
<body style="background-image:url(3.jpg)">
	
	<form  action="formulario.php" method="POST" class="form-register">
	    <h1 class="form_titulo">"AGREGA UN REGISTRO"</h1>
        <div class="contenedor-inputs">
          
		
		<input type="text" name="nombre" placeholder="Usuario"/><br/><br/>
		
		<input type="password" name="passw" placeholder="password"/>
	
		<input type="text" name="email" placeholder="Email"/><br/><br/>
		<input type="submit" name="insert" value="INSERTAR DATOS"/>
	</center>
	
	</form>

	
	<?php 
	if(isset($_POST['insert'])){
	
		$usuario = $_POST['nombre'];
		$pass = $_POST['passw'];
		$email = $_POST['email'];
		
		$insertar = "INSERT INTO users (usuario,password,email) values ('$usuario','$pass','$email')";
		
		$ejecutar = mysqli_query($con,$insertar);
	
		if($ejecutar){
		
		echo "<h3><Center>Insertado correctamente</center></h3>";
		}
	}
	
	?> 
	<br/>
	<center>
	<table width="500" border="2" style="background-color: #F9F9F9;">
	
		<tr>
			<th>ID</th>
			<th>Usuario</th>
			<th>Password</th>
			<th>Email</th>
			<th>Editar</th>
			<th>Borrar</th>
		</tr>
		
		<?php 
			
			
			$consulta = "SELECT * FROM users";
			
			$ejecutar = mysqli_query($con, $consulta); 
			
			$i = 0;
			
			while($fila=mysqli_fetch_array($ejecutar)){			
				$id = $fila['id'];
				$usuario = $fila['usuario']; 
				$password = $fila['password']; 
				$email = $fila['email'];
				
				$i++;	
			
		?>
		
		
		
		     <tr align="center">
			 <td><?php echo $id; ?></td>
			 <td><?php echo $usuario; ?></td>
			 <td><?php echo $password; ?></td>
			 <td><?php echo $email; ?></td>
			 <td><a href="formulario.php?editar=<?php echo $id; ?>">Editar</a></td>
			 <td><a href="formulario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
		      </tr>
	  <?php } ?>
		
	   </center>
	</table>
	<?php
		if(isset($_GET['editar'])){
		include("editar.php");
		}
	?> 
	<?php 
	if(isset($_GET['borrar'])){
	
	$borrar_id = $_GET['borrar'];
	
	$borrar = "DELETE FROM users WHERE id='$borrar_id'";
	
	$ejecutar = mysqli_query($con,$borrar); 
		
		if($ejecutar){
		
		echo "<script>alert('El usuario ha sido borrado!')</script>";
		echo "<script>window.open('formulario.php','_self')</script>";
		}
	
	}
	
	?>
	

</body>
</html>



