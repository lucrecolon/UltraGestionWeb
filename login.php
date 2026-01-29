<?php
// LOGIN.PHP - VERSIÓN FINAL
include("common/common.php");

$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";

// Inicializamos sesión
if (!isset($_SESSION["loginOK"])) $_SESSION["loginOK"] = 0;

// Consulta a la Base de Datos
$db->sql("SELECT * FROM usuarios WHERE USUARIO = '$usuario'");

if ($db->hay_resultados()) {
    // CORRECCIÓN CRÍTICA: Usamos MAYÚSCULAS porque así lo devuelve tu base de datos
    $r_usuario = $db->campo("USUARIO"); 
    $r_clave   = $db->campo("CLAVE");
    $r_estado  = $db->campo("estado"); // Este suele venir en minúscula si se creó así, o probamos ambos
    if (!$r_estado) $r_estado = $db->campo("ESTADO");
    
    $r_fecha_ingreso = $db->campo("fec_ult_ingr");
} else {
    $r_usuario = "";
    $r_clave   = "";
}

// LÓGICA DE VALIDACIÓN
// 1. Usuario Demo
if ($usuario == "ultra" && $contrasena == "demo") {
    echo "<script>location.href = 'WinUltraDemo.exe'</script>";
} 
// 2. Usuario Real o Maestro
else {
    $contrasenamaestra = "u1l1t1r1a1master";
    
    // Comparamos los datos (usamos trim para limpiar espacios)
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
            
            // Actualizamos fecha de último ingreso
            $fecha_ingr = date('Y-m-d H:i:s');
            $db->sql("UPDATE usuarios SET fec_ult_ingr='$fecha_ingr' WHERE usuario='$usuario'");

            // REDIRECCIÓN AL DASHBOARD
            echo "<script>location.href = 'servcli.php'</script>";
        }
    } else {
        // LOGIN FALLIDO
        $_SESSION["loginOK"] = 0;
        echo "<script>location.href = 'index.php?mal_login=1'</script>";
    }
}
?>