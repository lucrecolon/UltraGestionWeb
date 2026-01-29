<?php
class directorio {
  var $rutaabsoluta;
  var $ruta;
  var $archivo;
	var $rutaarchivo;
  var $esdirectorio;
  var $tamano;
  var $error;

  function listar($relistar=0) {
		static $abierto;
		static $dir;
		static $rutaant;
    if ($relistar==1) {
			$rutaant="kjhdjgu43gd732d4i3fd45rfuy427";
		}
		if ($this->ruta != $rutaant) {
		  $abierto=0;
			if (isset($dir)) {
			  closedir($dir);
			}
		}
		if (!isset($this->ruta)) {
      $error = "No se ha definido la ruta.";
  		return 0;
    }else{
  	  if ($abierto==0) {
  		  $dir = opendir($this->rutaabsoluta . "/" .$this->ruta);
				$abierto=1;
			}
			$this->archivo = readdir($dir);
			if (is_dir($this->archivo)) {
        $this->esdirectorio=1;
			}else{
			  $this->esdirectorio=0;
			}
			$this->tamano	=filesize($this->rutaabsoluta . "/" .$this->ruta . "/" . $this->archivo);	
			$this->rutaarchivo=$this->rutaabsoluta . "/" .$this->ruta . "/" . $this->archivo;	
  	}
    $rutaant=$this->ruta;
  }
}
?>
