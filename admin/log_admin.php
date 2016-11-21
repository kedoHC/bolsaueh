<?php include '../inc/cabecera_comun_admin.inc'; ?>


<div id="titulo-admin-log">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            	<h1 class="text-center">Iniciar Sesión de Aministrador</h1>
            </div>
        </div>
    </div>
</div>
<div id="form-admin-log">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
      			<h2 class="text-center">Iniciar Sesión</h2>        
            </div>
            <div class="row">
            	<div class="col-xs-12">
            	<form name="form-admin-log" action="confirm_admin.php" method="POST" autocomplete="off">
            		<input  class="center-block" type="text" name="usuario" placeholder="Usuario Administrador" required="on">
            	</div>
            </div>
            <div class="row">
            	<div class="col-xs-12">
            		<input  class="center-block" type="password" name="contra" placeholder="Contraseña" required="on">
            	</div>
            </div>
             <div class="row">
            	<div class="col-xs-12">
            		<input  class="center-block" type="submit" value="Ingresar">
            	</div>
            </div>
            <div class="row">
            	<div class="col-xs-12">
            		<p class="text-center">Acceso Restringido</p>
            		<p class="text-center">Solo personal autorizado</p>
            	</div>
            </div>
        </div>
    </div>
</div>


<?php include '../inc/pie_comun_admin.inc'; ?>
