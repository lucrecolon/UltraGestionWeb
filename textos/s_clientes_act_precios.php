<?php
if (strtolower($session_usr_estado)=="6" || strtolower($session_usr_estado)=="1") {
  if ($_SESSION["loginOK"]==1) {
    include("s_clientes_act_precios2.php");
	}
} else {
  $_SESSION["loginOK"]=0;
  echo "<SCRIPT>javascript:location.href = 'index.php'</SCRIPT>";
}

?>
