<?php 
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc';
include '../../inc/config.inc';

$id = $_SESSION['id_egresado'];
$peticion_egresado = "SELECT * FROM alumno WHERE id_alumno = '$id'";
$resultado_egresado = mysqli_query($conexion, $peticion_egresado);

while($fila_egresado = mysqli_fetch_array($resultado_egresado)){
    echo '
<div id="perfil-egresado">
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
            	<div class="row izquierdo-foto">
            		<div class="col-xs-4">
            			<img class="img-responsive img-circle center-block" src="../../img/egresados/foto-egresado-1.png">
            		</div>
            		<div class="col-xs-8 medio-datos-grales">
            			<h1>'.$fila_egresado["nombre"].'</h1>
            			<h3>'.$fila_egresado["titulo"].'</h3>
            			<p class="text-right">'.$fila_egresado["direccion"].'<span class="fa fa-home"></span></p>
            			<p class="text-right">'.$fila_egresado["telefono"].'<span class="fa fa-phone"></span></p>
            			<p class="text-right">'.$fila_egresado["correo"].'<span class="fa fa-envelope"></span></p>
            			<p class="text-right">'.$fila_egresado["facebook"].'<span class="fa fa-facebook-official"></span></p>
            		</div>
            	</div>
            	<div class="row etiqueta etiqueta-completa">	
            		<div class="col-xs-4">
            			<p class="text-center">Acerca de mi</p>
            		</div>
            		<div class="col-xs-8">
            			<p class="text-center">Informacion academica</p>
            		</div>
            	</div>				
            	<div class="row">	
            		<div class="col-xs-4 acercademi">
            			<p class="titulo-dato matricula">Matricula</p><p>'.$fila_egresado["matricula"].'</p>
            			<p class="titulo-dato">Fecha de Nacimiento</p><p>'.$fila_egresado["fechaNac"].'</p>
            			<p class="titulo-dato">Lugar de Residencia</p><p>'.$fila_egresado["ciudad"].', '.$fila_egresado["estado"].'</p>
            			<p class="titulo-dato">Sexo</p><p>'.$fila_egresado["sexo"].'</p>
            			<p class="titulo-dato">RFC</p><p>'.$fila_egresado["rfc"].'</p>
            			<div class="row">
	            			<div class="col-xs-12 etiquetas">
	            				<p class="text-center">Hablidades</p>
	            			</div>
            			</div>
            			<p>'.$fila_egresado["habilidad1"].'</p>
            			<p>'.$fila_egresado["habilidad2"].'</p>
            			<p>'.$fila_egresado["habilidad3"].'</p>
            			<p>'.$fila_egresado["habilidad4"].'</p>
            			<p>'.$fila_egresado["habilidad5"].'</p>
            			<div class="row">
	            			<div class="col-xs-12 etiquetas">
	            				<p class="text-center">Otros idiomas</p>
	            			</div>
            			</div>
            			<p>'.$fila_egresado["idioma1"].'</p>
                        <p>'.$fila_egresado["idioma2"].'</p>
                        <p>'.$fila_egresado["idioma3"].'</p>
            		</div>
            		<div class="col-xs-8 medio-info-academica">
            			<h3 class="text-right anio-titulo">'.$fila_egresado["anioTitulo"].'</h3>
            			<h3 class="text-right titulo">'.$fila_egresado["titulo"].'</h3>
            			<h3 class="text-right anio-titulo">'.$fila_egresado["anioTitulo2"].'</h3>
            			<h3 class="text-right titulo">'.$fila_egresado["titulo2"].'</h3>
            			<h3 class="text-right anio-titulo">'.$fila_egresado["anioTitulo3"].'</h3>
            			<h3 class="text-right titulo">'.$fila_egresado["titulo3"].'</h3>
            			<h3 class="text-right anio-titulo">'.$fila_egresado["anioTitulo4"].'</h3>
            			<h3 class="text-right titulo">'.$fila_egresado["titulo4"].'</h3>
                        <h3 class="text-right anio-titulo">'.$fila_egresado["anioTitulo5"].'</h3>
                        <h3 class="text-right titulo">'.$fila_egresado["titulo5"].'</h3>
            		</div>
            	</div>	
            </div>
            <div class="col-xs-4 derecho">
				<div class="row">
        			<div class="col-xs-12 etiquetas">
        				<p class="text-center">Informacion Laboral</p>
        			</div>
    			</div>
				<p class="text-right anio-titulo">'.$fila_egresado["anioLabor1"].'</p>
				<h2>'.$fila_egresado["empresaLabor1"].'</h2>
				<p class="text-justify descripcion-puesto">'.$fila_egresado["actividadLabor1"].'</p>
				<p class="text-right anio-titulo">'.$fila_egresado["anioLabor2"].'</p>
				<h2>'.$fila_egresado["empresaLabor2"].'</h2>
				<p class="text-justify descripcion-puesto">'.$fila_egresado["actividadLabor2"].'</p>
				<p class="text-right anio-titulo">'.$fila_egresado["anioLabor3"].'</p>
				<h2>'.$fila_egresado["empresaLabor3"].'</h2>
				<p class="text-justify descripcion-puesto">'.$fila_egresado["actividadLabor3"].'</p>
            </div>           
        </div>
    </div>
    <div class="container editar">
        <div id="boton-editar" class="row">
            <div class="col-xs-4">
            <a href="editar_perfil.php"><button id="kedo" class="btn center-block">Editar Mi Perfil</button></a>
            </div>
            <div class="col-xs-4">
            <a href="editar_contra.php"><button id="kedo" class="btn center-block">Cambiar contraseña</button></a>
            </div>
            <div class="col-xs-4">
            <a href="salir_sistema.php"><button id="kedo" class="btn center-block">Salir del sistema</button></a>
            </div>
        </div> 
    </div> 
</div>
';
}
?>
<?php include '../../inc/pie_comun_egresado.inc'; ?>
