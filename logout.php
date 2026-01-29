<?php
session_start();
include ("common/funciones.php");
$session_usr_nombre=$_SESSION["session_usr_nombre"];
$_SESSION["loginOK"]=0;
$_SESSION["session_ruta_descarga"]="";
$_SESSION["loginOK"]=0;
log_usr($session_usr_nombre, "Cerró sesión");
header("location:index.php");
?>
