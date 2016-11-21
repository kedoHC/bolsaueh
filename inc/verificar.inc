<?php 
function verificar_nombre($nombre) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,50}$/",$nombre)){
    return true;
  }
  return false;
}
function verificar_nombre_empresa($nombre_empresa) {
  if(preg_match("/^\S[a-zA-Z0-9\sñáéíóúÁÉÍÓÚñÑ,.]{2,50}$/",$nombre_empresa)){
    return true;
  }
  return false;
}
function verificar_matricula($matricula_egresado){
  if(preg_match("/^[a-zA-Z]{2}\d{4}[a-zA-Z]{2}\d{3}$/",$matricula_egresado)){
  	return true;
  }
  return false;
}
function verificar_titulo($titulo_egresado){
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,60}$/",$titulo_egresado)){
  	return true;
  }
  return false;
}
function verificar_email($email){
  if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",$email)){
  	return true;
  }
  return false;
}
function verificar_rfc_empresa($rfc_empresa){
   if(preg_match("/^\S[a-zA-Z0-9\s]{2,15}$/",$rfc_empresa)){
    return true;
  }
  return false;
}
function verificar_puesto($puesto) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,50}$/",$puesto)){
    return true;
  }
  return false;
}
function verificar_telefono($telefono) {
  if(preg_match("/^\d{13}$/",$telefono) || preg_match("/^\d{12}$/",$telefono)){
    return true;
  }
  return false;
}
function verificar_nombre_oferta($nombre_oferta) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,50}$/",$nombre_oferta)){
    return true;
  }
  return false;
}
function verificar_ciudad($ciudad) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,20}$/",$ciudad)){
    return true;
  }
  return false;
}
function verificar_estado($estado) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,20}$/",$estado)){
    return true;
  }
  return false;
}
function verificar_sueldo($sueldo) {
  if(preg_match("/^\S[0-9\s]{1,5}$/",$sueldo)){
    return true;
  }
  return false;
}
function verificar_direccion($direccion) {
  if(preg_match("/^\S[a-zA-Z0-9\sñáéíóú,.#ÁÉÍÓÚñÑ]{2,50}$/",$direccion)){
    return true;
  }
  return false;
}
function verificar_sector($sector) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,30}$/",$sector)){
    return true;
  }
  return false;
}
function verificar_giro($giro) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚñÑ]{2,30}$/",$giro)){
    return true;
  }
  return false;
}
function verificar_facebook($facebook) {
  if(preg_match("/^\S[a-zA-Z0-9\s.]{5,30}$/",$facebook)){
    return true;
  }
  return false;
}
function verificar_usuario($usuario) {
  if(preg_match("/^\S[a-zA-Z0-9\s.@-_]{5,30}$/",$usuario)){
    return true;
  }
  return false;
}
function compararFechas($primera, $segunda){
  $valoresPrimera = explode ("/", $primera);   
  $valoresSegunda = explode ("/", $segunda); 
  $diaPrimera    = $valoresPrimera[0];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[2];
  $diaSegunda   = $valoresSegunda[0];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[2];
  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    // "La fecha ".$primera." no es válida";
    return false;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    // "La fecha ".$segunda." no es válida";
    return false;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 
}
function verificar_actividad_empresa($actividad_empresa) {
  if(preg_match("/^\S[a-zA-Z0-9\sñáéíóúÁÉÍÓÚñÑ.,]{2,250}$/",$actividad_empresa)){
    return true;
  }
  return false;
}
function verificar_idioma($idioma) {
  if(preg_match("/^\S[a-zA-Z0-9\sñáéíóúÁÉÍÓÚ%]{2,20}$/",$idioma)){
    return true;
  }
  return false;
}
function verificar_habilidad($habilidad) {
  if(preg_match("/^\S[a-zA-Z\sñáéíóúÁÉÍÓÚ,.]{2,30}$/",$habilidad)){
    return true;
  }
  return false;
}
?>