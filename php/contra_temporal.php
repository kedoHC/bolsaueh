<?php include '../inc/cabecera_comun_grales.inc'; ?>

<!-- Consulta que los campos de email esten correctos con RegExp de PHP -->
<!-- que sean iguales los dos email -->
<!-- que el email este registrado como usuario en la base de datos del sistema -->


<?php include '../inc/config.inc'; ?>

<?php
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
mysqli_set_charset($conexion, "utf8");

$email = $_POST['email'];
$email_confirm = $_POST['email_confirm'];

if(empty($email) || empty($email_confirm)){
	?>
	<script type="text/javascript">
		swal({
		  title: "¡Datos vacios!",
		  text: "Alguno de los campos esta vacio.",
		  type: "warning",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'olvide_contra.php#olvide-contra';
		}
		});
	</script>
	<?php
}else{
	if($email != $email_confirm){
		?>
	<script type="text/javascript">
		swal({
		  title: "¡Los correos no coinciden!",
		  text: "Verifica que ambos correos estan bien escritos.",
		  type: "warning",
		  allowEscapeKey: false,
		  allowOutsideClick: false
		 },
		function (confirmado) {
			if(confirmado){
				window.location.href = 'olvide_contra.php#olvide-contra';
		}
		});
	</script>
	<?php
	}
	else{
		$peticion = "SELECT correo FROM alumno WHERE correo = '$email' ";
		$resultado = mysqli_query($conexion, $peticion);
		$peticion2 = "SELECT email_empresa FROM empresas WHERE email_empresa = '$email' ";
		$resultado2 = mysqli_query($conexion, $peticion2);
		if(mysqli_num_rows($resultado) || mysqli_num_rows($resultado2)){
			?>
			<script type="text/javascript">
				swal({
				  title: "¡Correo enviado!",
				  text: "Ya mandamos tu nueva contraseña. ¡Gracias!.",
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
				  title: "¡Correo no encontrado!",
				  text: "El correo no esta en nuestra base de datos. ¡Registrate!",
				  type: "error",
				  allowEscapeKey: false,
				  allowOutsideClick: false
				 },
				function (confirmado) {
					if(confirmado){
						window.location.href = '../index.php#titulo-log';
				}
				});
			</script>
			<?php
		}
	}
}
?>
<?php include '../inc/pie_comun_grales.inc'; ?>
