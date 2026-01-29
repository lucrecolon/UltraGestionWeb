<?php
set_time_limit(14400);  // en segundos = 4 horas

$db->sql("select * from webartic where DTSTAMP>'$fecha_act 00:00:00'");

if ($db->hay_resultados()) {
  $arch_sal = $_SESSION['session_usr_nombre'].$_SESSION['session_usr_fecsus'].".txt";

  if (!$a = fopen($arch_sal,'w')) {
    echo 'No se pudo crear el archivo<br>';
    exit;
  }
  
  $enc = '"RECNO";"BICCTA";"ISBN";"TITULO";"AUTOR";"TITULOEXT";"MONEDA";"PRECTAPA";"ALICIVA";"IDIOMA";"ACCESORIO";"TIPOARTIC";"ENCUADERN";"CODPROVEE";"CODEDITOR";"CODTEMA";"CODCOLECC";"ESTADO";"DTSTAMP";';
  fwrite($a,$enc."\r\n");
  for($n;$n<=$db->ultimo_registro;$n++) {
    $RECNO = sprintf('%09d;',$db->campo('Recno'));
    $BICCTA = sprintf('%013d;',$db->campo('BICCTA'));
    $ISBN = sprintf('"%-013s";',$db->campo('ISBN'));
    $TITULO = sprintf('"%-50s";',$db->campo('TITULO'));
    $AUTOR = sprintf('"%-50s";',$db->campo('AUTOR'));
    $TITULOEXT = sprintf('"%-50s";',$db->campo('TITULOEXT'));
    $MONEDA = sprintf('%06d;',$db->campo('MONEDA'));
    $PRECTAPA = sprintf('%08.2f;',$db->campo('PRECTAPA'));
    $ALICIVA = sprintf('%05.2f;',$db->campo('ALICIVA'));
    $IDIOMA = sprintf('"%-01s";',$db->campo('IDIOMA'));
    $ACCESORIO = sprintf('%06d;',$db->campo('ACCESORIO'));
    $TIPOARTIC = sprintf('%06d;',$db->campo('TIPOARTIC'));
    $ENCUADERN = sprintf('"%-01s";',$db->campo('ENCUADERN'));
    $CODPROVEE = sprintf('%06d;',$db->campo('CODPROVEE'));
    $CODEDITOR = sprintf('%06d;',$db->campo('CODEDITOR'));
    $CODTEMA = sprintf('%06d;',$db->campo('CODTEMA'));
    $CODCOLECC = sprintf('%06d;',$db->campo('CODCOLECC'));
    $ESTADO = sprintf('%02d;',$db->campo('ESTADO'));
    $DTSTAMP = sprintf('"%-19s";',$db->campo('DTSTAMP'));
    $dataline = $RECNO.$BICCTA.$ISBN.$TITULO.$AUTOR.$TITULOEXT.$MONEDA.$PRECTAPA.$ALICIVA.$IDIOMA.$ACCESORIO.$TIPOARTIC.$ENCUADERN.$CODPROVEE.$CODEDITOR.$CODTEMA.$CODCOLECC.$ESTADO.$DTSTAMP;
    fwrite($a,$dataline."\r\n");
  	$db->siguiente();
  }
  fclose($a);
	if ($db->sql("UPDATE usuarios SET FECSUS=\"".date("Y-m-d H:i:s")."\" WHERE USUARIO='".$_SESSION['session_usr_nombre']."'")) {
  	Print ("Proceso finalizado.<br><br>");
  	Print ("Archivo $arch_sal generado con las últimas actualizaciones. Pulse <a href=\"auto_descarga.php?archivo=$arch_sal\">aquí</a> para descargarlo.");
    $db->sql("select * from usuarios where USUARIO = '".$_SESSION['session_usr_nombre']."';");
    include("usr_estado.php");
	}
} else {
  Print "No se generaron cambios desde la fecha ".fechaDMA($fecha_act).".";
}
?>
