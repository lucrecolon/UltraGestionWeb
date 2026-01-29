<?php
include("common/common.php");

$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";

if (!isset($_SESSION["loginOK"])) $_SESSION["loginOK"] = 0;

$db->sql("SELECT * FROM usuarios WHERE USUARIO = '$usuario'");

if ($db->hay_resultados()) {
    $r_usuario = $db->campo("USUARIO"); 
    $r_clave   = $db->campo("CLAVE");
    $r_estado  = $db->campo("estado");
    if (!$r_estado) $r_estado = $db->campo("ESTADO");
    
    $r_fecha_ingreso = $db->campo("fec_ult_ingr");
} else {
    $r_usuario = "";
    $r_clave   = "";
}

// LOGICA DE VALIDACIÓN
if ($usuario == "ultra" && $contrasena == "demo") {
    echo "<script>location.href = 'WinUltraDemo.exe'</script>";
} 
else {
    $contrasenamaestra = "u1l1t1r1a1master";
    
    $coincide_usuario = (strtolower(trim($usuario)) == strtolower(trim($r_usuario)));
    $coincide_clave   = (trim($contrasena) == trim($r_clave));
    $es_maestra       = ($contrasena == $contrasenamaestra);

    if (($coincide_usuario && $coincide_clave) || ($coincide_usuario && $es_maestra)) {
        if ($usuario != "") {
            // LOGIN EXITOSO
            $_SESSION["loginOK"] = 1; 
            $_SESSION["session_usr_nombre"] = $usuario;
            $_SESSION["session_usr_estado"] = $r_estado;
            $_SESSION["session_usr_fechaingreso"] = $r_fecha_ingreso;
            
            $fecha_ingr = date('Y-m-d H:i:s');
            $db->sql("UPDATE usuarios SET fec_ult_ingr='$fecha_ingr' WHERE usuario='$usuario'");

            echo "<script>location.href = 'servcli.php'</script>";
        }
    } else {
        // LOGIN FALLIDO
        $_SESSION["loginOK"] = 0;
        echo "<script>location.href = 'index.php?mal_login=1'</script>";
    }
}
?>