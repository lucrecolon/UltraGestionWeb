<?php
// Funciones Generales.

//Convierte una fecha del formato AAAA-MM-DD al formato DD-MM-AAAA
function FechaDMA($fecha) {
	$dia=substr($fecha,8,2);
	$mes=substr($fecha,5,2);
	$ano=substr($fecha,0,4);
	return ("$dia-$mes-$ano");
}

//Convierte una fecha del formato DD-MM-AAAA al formato AAAA-MM-DD 
function FechaAMD($fecha) {
	$dia=substr($fecha,0,2);
	$mes=substr($fecha,3,2);
	$ano=substr($fecha,6,4);
	return ("$ano-$mes-$dia");
}

//Valida si una fecha esta correctamente introducida (acepta AAAA-MM-DD)
function ValidarFecha($fecha) {
	$dia=substr($fecha,8,2);
	$mes=substr($fecha,5,2);
	$ano=substr($fecha,0,4);
	return checkdate($ano, $mes, $dia);
}

//Graba el archivo LOG de la actividad del usuario.
function log_usr($usuario, $accion) {
  $archivo = fopen("usuarios.log", "a");
  fwrite($archivo,	date("Y-m-d H:i").", ".$_SERVER["REMOTE_ADDR"].", $usuario, $accion.\r\n");
  fclose($archivo);
}

?>
