<?php
if (strtolower($session_usr_estado)=="5" || strtolower($session_usr_estado)=="1") {
  if ($_SESSION["loginOK"]==1) {
      print "<table border=0 cellpadding=\"1%\" cellspacing=0 bgcolor=\"#efefef\">";
      print "<tr bgcolor=\"navy\" height=\"1\">";
      print "<td colspan=\"1\"></td>";
      print "</tr>";
      print "<tr>";
      print "<td bgcolor=\"#dddddd\" align=\"left\"><b>Actualizaciones de Precios</b></td>";
      print "</tr>";
      print "<tr bgcolor=\"navy\" height=\"1\">";
      print "<td colspan=\"1\"></td>";
      print "</tr>";
      print "<tr><td>";
      print "<br>Bienvenido a la sección de actualización de novedades y precios. ";
      print "El propósito de este servicio es mantener la Base de datos de títulos del "; 
      print "sistema Ultra Gestion actualizada en forma permanente, contemplando las ";
      print "nuevas incorporaciones y variaciones sobre el precio de tapa.<br><br>";
      print "<br>"; 
      print "</td></tr>";
      print "<tr bgcolor=\"navy\" height=\"1\">";
      print "<td colspan=\"2\"></td>";
      print "</tr>";
      print "</table><br><br>";
      $_SESSION["session_ruta_descarga"] = "/scdcus/precios";
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

