<?php
if (strtolower($session_usr_estado)=="2" || strtolower($session_usr_estado)=="1") {
  if ($_SESSION["loginOK"]==1) {
      include("s_clientes_actualizar2.php");
	} else { 
    $_SESSION["loginOK"]=0;
  	header("location:index.php");
	}
} else {
  $_SESSION["loginOK"]=0;
	header("location:index.php");
}

?>

