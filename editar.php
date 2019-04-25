        <?php 
		if(isset($_GET['editar'])){
			
			$editar_id = $_GET['editar']; 
			
			$consulta = "SELECT * FROM users WHERE id='$editar_id'";
			$ejecutar = mysqli_query($con, $consulta); 
			
			$fila= mysqli_fetch_array($ejecutar);
			
			$usuario = $fila['usuario']; 
			$pass = $fila['password']; 
			$email = $fila['email'];
			
			}
?>
		
<br/>
<form method="post" action="">
		<input type="text" name="nombre" value="<?php echo $usuario;?>"/><br/>
		<input type="password" name="passw" value="<?php echo $pass;?>"/><br/>
		<input type="text" name="email" value="<?php echo $email ;?>"/><br/>
		<input type="submit" name="actualizar" value="ACTUALIZAR DATOS"/>
	
</form>
	<?php 
	if(isset($_POST['actualizar'])){
	
		$actualizar_nombre = $_POST['nombre'];
		$actualizar_password = $_POST['passw'];
		$actualizar_email = $_POST['email'];
		
		$actualizar = "UPDATE users SET usuario='$actualizar_nombre', password='$actualizar_password', email='$actualizar_email' WHERE id='$editar_id'";
		
		$ejecutar = mysqli_query($con, $actualizar);
	
		if($ejecutar){
		
		echo "<script>alert('Datos actualizados!')</script>";
		echo "<script>window.open('formulario.php','_self')</script>";
		}
	}
	
	?> 