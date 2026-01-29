<?php
if (trim($session_usr_mensaje)) {
  echo "<center>";
	echo "<font class=\"rojo10bold\">.:: Mensaje ::.</font>";
	echo "<table bgcolor=\"#99ccff\" border=\"1\" width=500 height=50 bordercolor=#ffffff>";
  echo "<tr bgcolor=\"#f0f0f0\" bordercolor=\"#99ccff\">";
  echo "<td valign=\"top\">";
  echo "<table cellspacing=5 class=\"negro8\" width=\"100%\" bgcolor=\"#f0f0f0\">";
  echo "<tr><td align=\"left\">";
	echo "<b>$session_usr_mensaje</b><br>";
  echo "</td></tr></table>";
  echo "</td></tr></table>";
  echo "</center><br>";
}

if ($session_usr_estado==3 || $session_usr_estado==4) { //Si está inhabilitado mostrar mensaje y salir.
  echo "<center>";
  echo "<br><br><font class=\"rojo14\">Usuario inhabilitado para operar</font><br>";
  echo "<br><font class=\"titulo12i\">Comuníquese con nuestro centro de atención<br>A los teléfonos ";
  echo "$inf_telefono1 ó $inf_telefono2</font>";
  echo "</center>";
	$_SESSION["loginOK"]=0;
} else {
  if ($session_usr_vto<date("Y-m-d")) { //Si está vencida la cuenta del usuario, notificar estado y salir.
		echo "<center>";
    echo "<br><br><font class=\"rojo14\">Cuenta de usuario vencida</font><br>";
    echo "<br><font class=\"titulo12i\">Comuníquese con nuestro centro de atención<br>A los teléfonos ";
    echo "$inf_telefono1 ó $inf_telefono2</font>";
    echo "</center>";
  	$_SESSION["loginOK"]=0;
	} else { // Desplegar menú de actualización.
	  echo "<center>";
  	echo "<table border=0 width=250 cellpadding=\"2%\" cellspacing=0 bgcolor=\"#efefef\">";
		echo "<tr bgcolor=\"#DBEBF6\" height=\"2\">";
    echo "<td colspan=\"2\"></td>";
    echo "</tr>";
		echo "<tr>";
    echo "<td bgcolor=\"#eeeeee\" align=\"middle\">.: MENU DE SERVICIOS :.</td>";
    echo "</tr>";
		echo "<tr bgcolor=\"#DBEBF6\" height=\"1\">";
    echo "<td colspan=\"2\"></td>";
    echo "</tr>";
    echo "<table><br>";
    echo "<div id=\"menuv\">";
    echo "        <ul>";
		if ($session_usr_estado=="2" || $session_usr_estado=="1") {
      echo "                <li><a href=\"servcli.php?servicio=actualizar\">Actualizaciones del sistema</a></li>";
    }
		if ($session_usr_estado=="5" || $session_usr_estado=="1") {
      echo "                <li><a href=\"servcli.php?servicio=setup\">Instalación - Setup</a></li>";
    }
		if ($session_usr_estado=="6" || $session_usr_estado=="1") {
      echo "                <li><a href=\"servcli.php?servicio=precios\">Descarga de Precios</a></li>";
    }
		if ($session_usr_estado=="7" || $session_usr_estado=="1") {
      echo "                <li><a href=\"servcli.php?servicio=utilidades\">Utilidades</a></li>";
    }
    echo "        </ul>";
    echo "</div>";
	  echo "</center>";
	}
}

?>
