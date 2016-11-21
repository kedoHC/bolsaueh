<?php 
session_start();
if(!isset($_SESSION["session-egresado"])){
  echo ("Es necesario iniciar session, redireccionando...");
  print "<META HTTP-EQUIV='Refresh' CONTENT='2; URL=../../index.php#titulo-log'>";
  exit;
}
include '../../inc/cabecera_comun_egresado.inc'; 
include '../../inc/config.inc'; 

$id_egresado = $_SESSION["id_egresado"];

$peticion_egresado = "SELECT * FROM alumno WHERE id_alumno = '$id_egresado' ";
$resultado_egresado = mysqli_query($conexion, $peticion_egresado);

while($fila_egresado = mysqli_fetch_array($resultado_egresado)){
	echo '
<div id="formulario-egresado">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center">Editar Perfil Egresado</h1>
            	<h3 class="text-center">Es un poco extenso, pero vale mucho la pena. Lo prometemos.</h3>
            	<div class="row">
            		<div class="col-xs-1"></div>
            		<div class="col-xs-10">
            			<form name="form-nueva-oferta" action="actualizar_perfil.php" method="POST" autocomplete="off">

            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Nombre:</h2>
            				</div>
            				<div class="col-xs-4">
            					<input type="text" name="nombre" placeholder="Nombre del egresado" required="on" class=" form-control" value="'.$fila_egresado["nombre"].'">
            				</div>
                                    <div class="col-xs-2">
                                          <h2>Usuario:</h2>
                                    </div>
                                    <div class="col-xs-4">
                                          <input type="text" name="usuario" placeholder="Usuario" required="on" class=" form-control" value="'.$fila_egresado["usuario_alumno"].'">
                                    </div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Matricula:</h2>
            				</div>
            				<div class="col-xs-4">
            					<input type="text" name="matricula" placeholder="Matricula UEH" required="on" class=" form-control" value="'.$fila_egresado["matricula"].'">
            				</div>
            				<div class="col-xs-2">
            					<h2>RFC:</h2>
            				</div>
            				<div class="col-xs-4">
            					<input type="text" name="rfc" placeholder="RFC" required="on" class=" form-control" value="'.$fila_egresado["rfc"].'">
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Dirección:</h2>
            				</div>
            				<div class="col-xs-10">
            					<input type="text" name="direccion" placeholder="Dirección actual" class=" form-control" value="'.$fila_egresado["direccion"].'">
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Ciudad:</h2>
            				</div>
            				<div class="col-xs-4">
            					<input type="text" name="ciudad" placeholder="Ciudad de residencia" class=" form-control" value="'.$fila_egresado["ciudad"].'">
            				</div>
            				<div class="col-xs-2">
		            			<h2>Estado:</h2>
		            		</div>
		            		<div class="col-xs-4 select">
		            			 <select  name="estado" class="selectpicker" data-live-search="true">
									<option>'.$fila_egresado["estado"].'</option>
									<option data-tokens="Aguascalientes">Aguascalientes</option>
						            <option data-tokens="Baja California">Baja California</option>
						            <option data-tokens="Baja California Sur">Baja California Sur</option>
						            <option data-tokens="Campeche">Campeche</option>
						            <option data-tokens="Chiapas">Chiapas</option>
						            <option data-tokens="Chihuahua">Chihuahua</option>
						            <option data-tokens="Coahuila">Coahuila de Zaragoza</option>
						            <option data-tokens="Colima">Colima</option>
						            <option data-tokens="Durango">Durango</option>
						            <option data-tokens="Estado de Mexico">Estado de México</option>
						            <option data-tokens="Guanajuato">Guanajuato</option>
						            <option data-tokens="Guerrero">Guerrero</option>
						            <option data-tokens="Hidalgo">Hidalgo</option>
						            <option data-tokens="Jalisco">Jalisco</option>
						            <option data-tokens="Michoacan">Michoacán</option>
						            <option data-tokens="Morelos">Morelos</option>
						            <option data-tokens="Nayarit">Nayarit</option>
						            <option data-tokens="Nuevo Leon">Nuevo León</option>
						            <option data-tokens="Oaxaca">Oaxaca</option>
						            <option data-tokens="Puebla">Puebla</option>
						            <option data-tokens="Queretaro">Querétaro</option>
						            <option data-tokens="Quintana Roo">Quintana Roo</option>
						            <option data-tokens="San Luis Potosí">San Luis Potosí</option>
						            <option data-tokens="Sonora">Sonora</option>
						            <option data-tokens="Tabasco">Tabasco</option>
						            <option data-tokens="Tamaulipas">Tamaulipas</option>
						            <option data-tokens="Tlaxcala">Tlaxcala</option>
						            <option data-tokens="Veracruz">Veracruz</option>
						            <option data-tokens="Yucatan">Yucatán</option>
						            <option data-tokens="Zacatecas">Zacatecas</option>
								</select>
		            		</div>
            			</div>
            			


            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Telefono:</h2>
            				</div>
            				<div class="col-xs-4">
            					<input type="text" name="telefono" placeholder="Telefono personal" class=" form-control" value="'.$fila_egresado["telefono"].'">
            				</div>
            				<div class="col-xs-2">
		            			<h2>Sexo:</h2>
		            		</div>
		            		<div class="col-xs-4 select">
		            			 <select  name="sexo" class="selectpicker">
									<option>'.$fila_egresado["sexo"].'</option>
									<option data-tokens="M">M</option>
						            <option data-tokens="F">F</option>
								</select>
		            		</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Correo:</h2>
            				</div>
            				<div class="col-xs-4">
            					<input type="email" name="correo" placeholder="Correo elctronico de contacto" required="on" class=" form-control" value="'.$fila_egresado["correo"].'">
            				</div>
            				<div class="col-xs-2">
            					<h2>Facebook:</h2>
            				</div>
            				<div class="col-xs-4">
            					<input type="text" name="facebook" placeholder="Facebook" class=" form-control" value="'.$fila_egresado["facebook"].'">
            				</div>
            			</div>
            			
            			<div class="row">
		            		<div class="col-xs-4">
		            			<h2>Fecha de nacimiento:</h2>
		            		</div>
		            		<div class="col-xs-8">
		            			 <input name="fechaNac" type="text" class="form-control" id="datetimepickernacimiento" placeholder="Fecha de nacimiento:" value="'.$fila_egresado["fechaNac"].'"/>
		            		</div>
		            	</div>
            			<div class="row">
            				<div class="col-xs-12">
            					<h2 class="text-center">Hablanos un poco de tu carrera profesional:</h2>
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Titulo:</h2>
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="titulo" placeholder="Ultimo titulo recibido" required="on" class=" form-control" value="'.$fila_egresado["titulo"].'">
            				</div>
            				<div class="col-xs-1">
		            			<h2>Año:</h2>
		            		</div>
		            		<div class="col-xs-2">
		            			 <input name="anioTitulo" type="text" class="form-control" id="datetimepickeranioTitulo" required="on" placeholder="Año:" value="'.$fila_egresado["anioTitulo"].'"/>
		            		</div>
            			</div>

		            	<div class="row">
            				<div class="col-xs-12">
            					<h2 class="text-center">Titulos extras logrados:</h2>
            					<h3 class="text-center">(Posgrados, Cursos, Diplomados, Congresos, etc.)</h3>
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<h2>Titulo 2:</h2>
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="titulo2" placeholder="Titulo adquirido:" class=" form-control" value="'.$fila_egresado["titulo2"].'">
            				</div>
            				<div class="col-xs-1">
		            			<h2>Año:</h2>
		            		</div>
		            		<div class="col-xs-2">
		            			 <input name="anioTitulo2" type="text" class="form-control" id="datetimepickeranioTitulo2"  placeholder="Año" value="'.$fila_egresado["anioTitulo2"].'"/>
		            		</div>
            			</div>
		            	<div class="row">
            				<div class="col-xs-2">
            					<h2>Titulo 3:</h2>
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="titulo3" placeholder="Titulo adquirido:" class=" form-control" value="'.$fila_egresado["titulo3"].'">
            				</div>
            				<div class="col-xs-1">
		            			<h2>Año:</h2>
		            		</div>
		            		<div class="col-xs-2">
		            			 <input name="anioTitulo3" type="text" class="form-control" id="datetimepickeranioTitulo3"  placeholder="Año" value="'.$fila_egresado["anioTitulo3"].'"/>
		            		</div>
            			</div>
            			

		            	<div class="row">
            				<div class="col-xs-2">
            					<h2>Titulo 4:</h2>
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="titulo4" placeholder="Titulo adquirido:" class=" form-control" value="'.$fila_egresado["titulo4"].'">
            				</div>
            				<div class="col-xs-1">
		            			<h2>Año:</h2>
		            		</div>
		            		<div class="col-xs-2">
		            			 <input name="anioTitulo4" type="text" class="form-control" id="datetimepickeranioTitulo4"  placeholder="Año" value="'.$fila_egresado["anioTitulo4"].'"/>
		            		</div>
            			</div>
		            	<div class="row">
            				<div class="col-xs-2">
            					<h2>Titulo 5:</h2>
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="titulo5" placeholder="Titulo adquirido:" class=" form-control" value="'.$fila_egresado["titulo5"].'">
            				</div>
            				<div class="col-xs-1">
		            			<h2>Año:</h2>
		            		</div>
		            		<div class="col-xs-2">
		            			 <input name="anioTitulo5" type="text" class="form-control" id="datetimepickeranioTitulo5"  placeholder="Año" value="'.$fila_egresado["anioTitulo5"].'"/>
		            		</div>
            			</div>
            			
		            	<div class="row">
            				<div class="col-xs-12">
            					<h2 class="text-center">Cuentanos donde has trabajado y que labores realizabas:</h2>
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<h2 class="text-center">Año</h2>
            				</div>
            				<div class="col-xs-3">
            					<h2>Empresa:</h2>
            				</div>
            				<div class="col-xs-7">
            					<h2 class="text-center">Labores</h2>
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<input name="anioLabor1" type="text" class="form-control" id="datetimepickeranioLabor1"  placeholder="Año" value="'.$fila_egresado["anioLabor1"].'"/>
            				</div>
            				<div class="col-xs-3">
            					<input type="text" name="empresaLabor1" placeholder="Empresa donde trabajaste:" class=" form-control" value="'.$fila_egresado["empresaLabor1"].'">
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="actividadLabor1" placeholder="Actividades que realizabas:" class=" form-control" value="'.$fila_egresado["actividadLabor1"].'">
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<input name="anioLabor2" type="text" class="form-control" id="datetimepickeranioLabor2"  placeholder="Año" value="'.$fila_egresado["anioLabor2"].'"/>
            				</div>
            				<div class="col-xs-3">
            					<input type="text" name="empresaLabor2" placeholder="Empresa donde trabajaste:" class=" form-control" value="'.$fila_egresado["empresaLabor2"].'">
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="actividadLabor2" placeholder="Actividades que realizabas:" class=" form-control" value="'.$fila_egresado["actividadLabor2"].'">
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<input name="anioLabor3" type="text" class="form-control" id="datetimepickeranioLabor3"  placeholder="Año" value="'.$fila_egresado["anioLabor3"].'"/>
            				</div>
            				<div class="col-xs-3">
            					<input type="text" name="empresaLabor3" placeholder="Empresa donde trabajaste:" class=" form-control" value="'.$fila_egresado["empresaLabor3"].'">
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="actividadLabor3" placeholder="Actividades que realizabas:" class=" form-control" value="'.$fila_egresado["actividadLabor3"].'">
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-2">
            					<input name="anioLabor4" type="text" class="form-control" id="datetimepickeranioLabor4"  placeholder="Año" value="'.$fila_egresado["anioLabor4"].'"/>
            				</div>
            				<div class="col-xs-3">
            					<input type="text" name="empresaLabor4" placeholder="Empresa donde trabajaste:" class=" form-control" value="'.$fila_egresado["empresaLabor4"].'">
            				</div>
            				<div class="col-xs-7">
            					<input type="text" name="actividadLabor4" placeholder="Actividades que realizabas:" class=" form-control" value="'.$fila_egresado["actividadLabor4"].'">
            				</div>
            			</div>
            			<div class="row">
            				<div class="col-xs-12">
            					<h2 class="text-center">Idiomas y hablidades personales:</h2>
            					<h3 class="text-center">Ya estas terminando, ¡vas muy bien!</h3>
            				</div>
            			</div>
            			<div class="row">
		            		<div class="col-xs-3">
		            			<h2>Idiomas (%):</h2>
		            		</div>
		            		<div class="col-xs-9">
		            			<div class="row">
		            				<div class="col-xs-4">
										 <input name="idioma1" type="text" class="form-control" placeholder="Idioma (%)" value="'.$fila_egresado["idioma1"].'"/>
		            				</div>
		            				<div class="col-xs-4">
										 <input name="idioma2" type="text" class="form-control" placeholder="Idioma (%)" value="'.$fila_egresado["idioma2"].'"/>
		            				</div>
		            				<div class="col-xs-4">
										 <input name="idioma3" type="text" class="form-control" placeholder="Idioma (%)" value="'.$fila_egresado["idioma3"].'"/>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            	<div class="row">
		            		<div class="col-xs-12">
		            			<h2 class="text-center">Habilidades personales (no seas modesto):</h2>
		            		</div>
		            	</div>
		            	<div class="row">	
		            		<div class="col-xs-12">
		            			<div class="row">
		            				<div class="col-xs-1"></div>
		            				<div class="col-xs-2">
										 <input name="habilidad1" type="text" class="form-control" placeholder="Hablidad" maxlength="30" value="'.$fila_egresado["habilidad1"].'"/>
		            				</div>
		            				<div class="col-xs-2">
										 <input name="habilidad2" type="text" class="form-control" placeholder="Hablidad" maxlength="30" value="'.$fila_egresado["habilidad2"].'"/>
		            				</div>
		            				<div class="col-xs-2">
										 <input name="habilidad3" type="text" class="form-control" placeholder="Hablidad" maxlength="30" value="'.$fila_egresado["habilidad3"].'"/>
		            				</div>
		            				<div class="col-xs-2">
										 <input name="habilidad4" type="text" class="form-control" placeholder="Hablidad" maxlength="30" value="'.$fila_egresado["habilidad4"].'"/>
		            				</div>
		            				<div class="col-xs-2">
										 <input name="habilidad5" type="text" class="form-control" placeholder="Hablidad" maxlength="30" value="'.$fila_egresado["habilidad5"].'"/>
		            				</div>
		            				<div class="col-xs-1"></div>
		            			</div>
		            		</div>
		            	</div>
		            	<h3 class="text-center">* Campos requeridos</h3>
		            	<br><br>
		            	<div class="row">
		            		<div class="col-xs-12">
		            			<h1 class="text-center">¡Hemos terminado!:</h1>
		            			<h2 class="text-center">¿No estuvo tan mal verdad?</h2>
		            			<h3 class="text-center">Con estos datos creamos tu CV profesional. Con esto las empresas puden ver tus datos profesionales y poder tomar una mejor decisión para el puesto que estan ofreciendo: TÚ.</h3>
		            			<h2 class="text-center">¡Mucho exito!</h2>

		            		</div>
		            	</div>
		            	<input class="btn btn-primary btn-lg center-block" type="submit" value="Crear CV">
		            	</form>  
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
';
}
?>
<?php include '../../inc/pie_comun_egresado.inc'; ?>