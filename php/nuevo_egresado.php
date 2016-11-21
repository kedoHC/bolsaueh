<?php include '../inc/cabecera_comun_grales.inc';
include '../inc/config.inc';
include '../inc/verificar.inc';


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");

$nombre = $_POST["nombre"];
$matricula = $_POST["matricula"];
$titulo = $_POST["titulo"];
$email = $_POST["email"];

if(empty($nombre) || empty($email)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Datos vacios!",
		  text: "Alguno de los campos requeridos esta vacio.",
		  type: "error",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'registro_egresado.php#menu';
		}
		});
	</script>
	<?php
	exit;
}
$peticion = "SELECT correo FROM alumno WHERE correo = '$email'";
$resultado = mysqli_query($conexion, $peticion);
if(mysqli_num_rows($resultado)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Email Registrado!",
		  text: "El email proporcionado ya pertenece a nuestra base de datos. Intenta en olvide contraseña.",
		  type: "error",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'olvide_contra.php#menu';
		}
		});
	</script>
	<?php
	exit;
}

if(!verificar_nombre($nombre)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre Incorrecto!",
			  text: "Nombre completo, sin números o carácteres especiales.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'registro_egresado.php#menu';
			}
			});
	</script>
	<?php
}
if(!verificar_email($email)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Email Incorrecto!",
			  text: "Seguir el formato estandar de Email. Ej. egresados@ueh.com.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'registro_egresado.php#menu';
			}
			});
	</script>
	<?php
}
if(!empty($matricula)){
	$peticion2 = "SELECT matricula FROM alumno WHERE matricula = '$matricula'";
	$resultado2 = mysqli_query($conexion, $peticion2);

	if(mysqli_num_rows($resultado2)){
		?>
		<script type="text/javascript">
			swal({
			  title: "¡Matricula Registrada!",
			  text: "La matricula proporcionada ya pertenece a nuestra base de datos. Intenta en olvide contraseña o contacta al Administrador del sistema. ¡Gracias!",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'olvide_contra.php#menu';
			}
			});
		</script>
		<?php
		exit;
	}
	elseif(!verificar_matricula($matricula)){
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Matricula Incorrecta!",
				  text: "Seguir el formato - EH2222SC333 - NO ES UN CAMPO OBLIGATORIO.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'registro_egresado.php#menu';
				}
				});
		</script>
		<?php
	}
	else{
		$matricula_verificada = true;
	}
}
else{
	$matricula_verificada = true;
}
if(!empty($titulo)){
	if(!verificar_titulo($titulo)){
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Titulo Incorrecto!",
				  text: "Debe estar bien escrito, sin numero o caracteres especiales - NO ES UN CAMPO OBLIGATORIO.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'registro_egresado.php#menu';
				}
				});
		</script>
		<?php
	}
	else{
		$titulo_verificado = true;
	}
}
else{
	$titulo_verificado = true;
}

if(verificar_nombre($nombre) AND $matricula_verificada AND $titulo_verificado AND verificar_email($email)){

	$nombre = strtoupper($nombre);
	$titulo = strtoupper($titulo);
	$matricula = strtoupper($matricula);
	$email = strtoupper($email);

	$contra_temp = password_hash($matricula,  PASSWORD_DEFAULT, ['cost' => 10]);

	$peticion_nuevo_egresado = "INSERT INTO alumno (usuario_alumno, contra_alumno, nombre, matricula, titulo, correo, acceso, status) VALUES (
			 '$email', '$contra_temp', '$nombre', '$matricula', '$titulo', '$email', 0, 'PENDIENTE');";
	$resultado_nuevo_egresado = mysqli_query($conexion, $peticion_nuevo_egresado);

	if($resultado_nuevo_egresado){
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Se creo el registro!",
				  text: "¡Estaremos en contacto muy pronto, Gracias!",
				  type: "success",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = '../index.php';
				}
				});
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Error de sistemas!",
				  text: "Favor de intentar una vez mas o contactar al Administrador del sistema.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'registro_egresado.php#menu';
				}
				});
		</script>
		<?php
	}
}
include '../inc/pie_comun_grales.inc'; ?>
