<?php

	include('conexion_be.php');	
	
	if(!isset($_SESSION['usuario'])){
		session_start();
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];
		
		$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");
		
		if(mysqli_num_rows($validar_login) > 0){
			$_SESSION['usuario'] = $correo;
			header("location: ../index_usuario.php ");
			exit();
		}
		else{
			echo '
				<script>
					alert("Usuario no existe, por favor intentelo de nuevo");
					window.location = "registro.php";
				</script>
			';
			exit();
		}
		mysqli_close($conexion);
	}
	
	if(isset($_SESSION['usuario'])){
		echo
			$_SESSION['usuario']
		;
	}
	

?>
