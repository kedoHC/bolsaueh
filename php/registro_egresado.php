<?php include '../inc/cabecera_comun_grales.inc'; ?>
<div id="formulario-egresado">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center animated bounce">Nuevo Egresado</h1>
            	<div class="row">
            		<div class="col-xs-3"></div>
            		<div class="col-xs-6">
            			<form name="form-nuevo-egresado" action="nuevo_egresado.php" method="POST" autocomplete="off">
		            	<input type="text" name="nombre" placeholder="Nombre completo" required="on" class="animated bounce"><span>*</span><br>
		            	<input type="text" name="matricula" placeholder="Matrícula" maxlength="11" class="animated bounce"><br>
		            	<input type="text" name="titulo" placeholder="Titulo" class="animated bounce"><br>
		            	<input type="text" name="email" placeholder="Email" required="on" class="animated bounce"><span>*</span><br>
		            	<p class="text-center">* Campos requeridos</p>
		            	<input class="center-block" type="submit" value="Enviar mis datos">
		            	</form>  
            		</div>
            		<div class="col-xs-3"></div>
            	</div>
            	    
            </div>
        </div>
    </div>
</div>

<?php include '../inc/pie_comun_grales.inc'; ?>