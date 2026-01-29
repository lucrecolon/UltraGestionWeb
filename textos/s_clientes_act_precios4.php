<?php
//Proceso: Cambiar fecha de actualizacion.

//*Variables POST
$dd=$_POST['nueva_fecha_dd'];
$mm=$_POST['nueva_fecha_mm'];
$aaaa=$_POST['nueva_fecha_aaaa'];
$aceptar=$_POST['aceptar'];
$cancelar=$_POST['cancelar'];
//*

if ($aceptar=="Aceptar") {
  if(@checkdate($mm,$dd,$aaaa)) {
    echo "Fecha ok! No se grabó por testing...";
  } else {
		echo "Fecha incorrecta";
	}
} elseif($cancelar=="Cancelar") {
  echo "Cancelado!";
} else {
  $actual_fecha=fechaDMA($_SESSION['session_usr_fecsus']);
  Echo "Última fecha de actualización: <b>" . $actual_fecha ."</b><br><br>";
  echo "Ingrese desde qué nueva fecha desea descargar las actualizaciones de precios.<br>";
  echo "La fecha no debe superar los 30 días anteriores desde la última actualización.<br><br>";
  echo "<form action=\"textos/s_clientes_act_precios4.php\" method=\"POST\">";
  echo "<b>Ingrese nueva fecha: </b><BR>";
  echo "Día <input type=\"text\" name=\"nueva_fecha_dd\" maxlength=\"2\" size=\"2\" />";
  echo " Mes <input type=\"text\" name=\"nueva_fecha_mm\" maxlength=\"2\" size=\"2\" />";
  echo " Año <input type=\"text\" name=\"nueva_fecha_aaaa\" maxlength=\"4\" size=\"4\" />";
  echo "<br><br>";
  echo "<input type=\"submit\" name=\"aceptar\" value=\"Aceptar\">&nbsp;&nbsp;";
  echo "<input type=\"submit\" name=\"cancelar\" value=\"Cancelar\">";  
  echo "</form>";
}
?>

