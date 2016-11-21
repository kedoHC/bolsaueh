<?php include '../inc/cabecera_comun_grales.inc';
include '../inc/config.inc';
include '../inc/verificar.inc';


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");

$nombre = $_POST["nombre"];
$rfc = $_POST["rfc"];
$contacto = $_POST["contacto"];
$puesto = $_POST["puesto"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];

if(empty($nombre) || empty($rfc) || empty($contacto) || empty($email) ){
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
				window.location.href = 'registro_empresa.php#menu';
		}
		});
	</script>
	<?php
	exit;
}
$peticion = "SELECT email_empresa FROM empresas WHERE email_empresa = '$email'";
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
$peticion_rfc = "SELECT rfc FROM empresas WHERE rfc = '$rfc'";
$resultado_rfc = mysqli_query($conexion, $peticion_rfc);
if(mysqli_num_rows($resultado_rfc)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡RFC Registrado!",
		  text: "El RFC proporcionado ya pertenece a nuestra base de datos. Intenta en olvide contraseña.",
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

if(!verificar_nombre_empresa($nombre)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre de empresa Incorrecto!",
			  text: "Nombre completo, sin caracteres especiales, solo numeros y letras.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'registro_empresa.php#menu';
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
			  text: "Seguir el formato estandar de Email. Ej. empresaDeptoRH@empresa.com.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'registro_empresa.php#menu';
			}
			});
	</script>
	<?php
}
if(!verificar_rfc_empresa($rfc)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡RFC Incorrecto!",
			  text: "Solo letras y numeros. Maximo 15 caracteres.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'registro_empresa.php#menu';
			}
			});
	</script>
	<?php
}
if(!verificar_nombre($contacto)){
	?>
	<script type="text/javascript">
		swal({
			  title: "¡Nombre de contacto Invalido!",
			  text: "Bien escrito, sin caracteres especiales.",
			  type: "error",
			  allowEscapeKey: false,
			  allowOutsideClick: false
			 },
			function (confirmado) {
				if(confirmado){
					window.location.href = 'registro_empresa.php#menu';
			}
			});
	</script>
	<?php
}

if(!empty($puesto)){
	if(!verificar_puesto($puesto)){
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Puesto Invalido!",
				  text: "Puesto Invalido, sin caracteres especiales, NO ES UN CAMPO OBLIGATORIO.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'registro_empresa.php#menu';
				}
				});
		</script>
		<?php
	}
	else{
		$puesto_verificado = true;
	}
}
else{
	$puesto_verificado = true;
}

if(!empty($telefono)){
	if(!verificar_telefono($telefono)){
		?>
		<script type="text/javascript">
			swal({
				  title: "¡Telefono invalido!",
				  text: "Formato de 12 digitos ó 13 digitos para celular. Ej: 012288151515 ó 0442281121212 - NO ES UN CAMPO OBLIGATORIO",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'registro_empresa.php#menu';
				}
				});
		</script>
		<?php
	}
	else{
		$telefono_verificado = true;
	}
}
else{
	$telefono_verificado = true;
}

if(verificar_nombre_empresa($nombre) AND verificar_nombre($contacto) AND verificar_rfc_empresa($rfc) AND $puesto_verificado AND $telefono_verificado AND verificar_email($email)){

	$nombre = strtoupper($nombre);
	$contacto = strtoupper($contacto);
	$rfc = strtoupper($rfc);
	$puesto = strtoupper($puesto);
	$email = strtoupper($email);

	$contra_temp = password_hash($rfc,  PASSWORD_DEFAULT, ['cost' => 10]);

	$peticion_nueva_empresa = "INSERT INTO empresas (usuario_empresa, contra_empresa, empresa, rfc, contacto, puesto_contacto, telefono_empresa, email_empresa, acceso, status) VALUES (
			 '$email', '$contra_temp', '$nombre', '$rfc', '$contacto', '$puesto', '$telefono', '$email', 0, 'PENDIENTE');";
	$resultado_nueva_empresa = mysqli_query($conexion, $peticion_nueva_empresa);

	if($resultado_nueva_empresa){
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
				  title: "¡Error de sistema!",
				  text: "Favor de intentar una vez mas o contactar al Administrador del sistema.",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = 'registro_empresa.php#menu';
				}
				});
		</script>
		<?php
	}
}
include '../inc/pie_comun_grales.inc'; ?>
