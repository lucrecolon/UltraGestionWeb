<?
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

class actualizaciones { 
  var $ruta;
	var $archivo;
	var $descripcion;
  var $tamano;
	function listar($relistar=0) {
    static $d;
    if ($relistar==1) {
    	$d = new directorio;
      $d->rutaabsoluta = "";
      $d->ruta = $this->ruta;
		}
    $sigo=1;
		do {
			$d->listar();
  	  $this->archivo = "";
  	  $this->descripcion = "";
			if ($d->archivo == "")
			{
			  $sigo=0;
				$this->archvio="";
				$this->descripcion="";
			}else
      {
				if ((substr($d->archivo,strlen ($d->archivo)-4) != ".des") && ($d->archivo != ".") && ($d->archivo != ".."))
				{
					$sigo=0;
					$this->archivo = $d->archivo;
					$this->tamano =  $d->tamano;
          if (file_exists(substr($d->rutaarchivo,0,strlen($d->rutaarchivo)-4).".des"))
					{
      			$aaa = file(substr($d->rutaarchivo,0,strlen($d->rutaarchivo)-4).".des");
        		if (count($aaa)) {
        		    foreach($aaa as $conten) {
										$this->descripcion=$this->descripcion.$conten;				
        				}
        		}
      		}else
					{
						$sigo=0;
 		  		}
  			}
		  }
    } while($sigo>0);



	
	}
}
?>
