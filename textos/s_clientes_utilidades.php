<?php
if (strtolower($session_usr_estado)=="7" || strtolower($session_usr_estado)=="1") {
  if ($_SESSION["loginOK"]==1) {
      $_SESSION["session_ruta_descarga"] = "/scdcus/utilidades";
      include("s_clientes.php");
	} else { 
    $_SESSION["loginOK"]=0;
  	header("location:index.php");
	}
} else {
  $_SESSION["loginOK"]=0;
	header("location:index.php");
}

?>
