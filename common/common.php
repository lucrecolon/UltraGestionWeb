<?php
// Configuración de Sesión Moderna
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluimos la clase nueva
include_once "common/clases.php"; 

// Conectamos a la base de datos
$db = new db;
$db->abrir(); 

// Variables Globales de la Empresa
$inf_domicilio = "Maipú 812 piso 9º Of 'A'";
$inf_localidad = "Ciudad de Buenos Aires";
$inf_pais = "Argentina";
$inf_telefono1 = "(54-11) 4312-5510";
$inf_nombre_empresa = "Cúspide Computación S.R.L.";
$inf_email_empresa = "info@ultragestion.com.ar";
$inf_path_clientes = "/home/soporte3/public_html/w/scdcus/";

// Inicializamos variables de sesión para evitar errores
if (!isset($_SESSION['loginOK'])) $_SESSION['loginOK'] = 0;
if (!isset($_SESSION['session_usr_nombre'])) $_SESSION['session_usr_nombre'] = "";
if (!isset($_SESSION['session_usr_estado'])) $_SESSION['session_usr_estado'] = "";
?>