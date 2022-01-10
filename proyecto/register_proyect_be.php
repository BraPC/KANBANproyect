<?php

	include('../conexion/conexion_be.php');

	//funcion para generar un codigo aleatorio que complementara el codigo del proyecto
	function generarCodigo($longitud) {
		$key = '';
		$pattern = '1,2,3,4,5,6,7,8,9,0,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z';
		$arr= explode(",",$pattern);
		$max = count($arr) - 1;
		for($i=0;$i < $longitud;$i++) $key .= $arr[mt_rand(0,$max)];
		return $key;
	} 

    session_start();
	$nombre_proyecto = $_POST['nombre_proyecto'];

	if($nombre_proyecto != ""){
        //se obtiene la fecha y hora
        $fecha = new DateTime();
        //se le establece una zona horaria
        $fecha->setTimezone(new DateTimeZone('America/Caracas'));
        //se guarda la fecha en las variables con el formato indicado
        $fecha_creada = $fecha->format('Y-m-d h:i:s');
	    $fecha_actualizada = $fecha_creada;
        //desarrollo en 0 = proyecto en proceso y 1 = proyecto culminado
	    $desarrollo = 0;
        $rol_usuario = 1;
        $correo = $_SESSION['correo'];
        //bucle do while para crear un codigo unico para cada proyecto
        do {
			$array = 'asdfghjklqwertyuiopzxcvbnmASDFGHJKLQWERTYUIOPZXCVBNM';

            $cod_proyecto = ''.random_int(99,9999999).'-?!'.generarCodigo(random_int(2,6));

            //Verificar que el codigo no se repita en la base de Datos
            $verificar_cod = mysqli_query($conexion, "SELECT * FROM proyectos WHERE cod_proyecto = '$cod_proyecto'");

            if(mysqli_num_rows($verificar_cod) > 0){
                $cod_proyecto = "";
            }# code...
        } while ($cod_proyecto == "");

        //query para insertar los datos a la base de datos
		$query = "INSERT INTO proyectos(cod_proyecto, nombre_proyecto, fecha_creada, fecha_actualizada, desarrollo) VALUES('$cod_proyecto', '$nombre_proyecto', '$fecha_creada', '$fecha_actualizada', '$desarrollo')";
        $query2 = "INSERT INTO enlace_proyectos(correo_usuario, cod_proyecto, rol_usuario) VALUES('$correo', '$cod_proyecto', '$rol_usuario')";
	}else{
		echo'
			<script>
				alert("No se llenaron todos los campos, intentelo de nuevo...");
				window.location = "register_proyect.php";
			</script>
		';
		mysqli_close($conexion);
	}
	
	//Verificar que el nombre no se repita para un mismo correo en la base de Datos
	

	$ejecutar = mysqli_query($conexion, $query);
	
	if($ejecutar){
        $ejecutar = mysqli_query($conexion, $query2);
        if ($ejecutar) {
            echo"
			<script>
				alert('Proyecto creado su codigo es $cod_proyecto');
				window.location = '../index_usuario.php';
			</script>
			
		    ";
        }else {
            echo'
			<script>
				alert("Intentelo de nuevo, registro no guardado");
				window.location = "register_proyect.php";
			</script>
			
			';
        }
		
		
	}
	else{
		echo"
			<script>
				alert('Proyecto creado su codigo es $cod_proyecto $correo $nombre_proyecto  $fecha_creada');
				window.location = '../index_usuario.php';
			</script>
			
		";
	}

	mysqli_close($conexion);

?>