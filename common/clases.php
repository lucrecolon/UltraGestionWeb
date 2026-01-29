<?php
class db {
    public $link;
    public $result;
    public $registro_actual;
    public $ultimo_registro;

    function abrir() {
        // DATOS DE CONEXIÓN
        $sql_usuario = "root";       
        $sql_password = "";          
        $sql_host = "localhost";
        $sql_base = "";


        $this->link = mysqli_connect($sql_host, $sql_usuario, $sql_password, $sql_base);

        if (!$this->link) {
            die("Error fatal: No se pudo conectar a la base de datos. Verifique que XAMPP MySQL esté corriendo.");
        }
        
        mysqli_set_charset($this->link, "utf8");
    }

    function sql($sql_texto) {
        $this->result = mysqli_query($this->link, $sql_texto);
        
        if (!$this->result) {
            die("Error en la consulta SQL: " . mysqli_error($this->link));
        }

        $this->registro_actual = 0;
        
        if (is_object($this->result)) {
            $this->ultimo_registro = mysqli_num_rows($this->result) - 1;
        } else {
            $this->ultimo_registro = -1;
        }
        
        return $this->result;
    }
    
    function campo($nombre_campo) {
        if ($this->ultimo_registro == -1) return null;
        
        mysqli_data_seek($this->result, $this->registro_actual);
        
        $row = mysqli_fetch_assoc($this->result);
        
        return isset($row[$nombre_campo]) ? $row[$nombre_campo] : null;
    }

    function siguiente() { if ($this->registro_actual < $this->ultimo_registro) $this->registro_actual++; }
    function anterior() { if ($this->registro_actual > 0) $this->registro_actual--; }
    function ir($nroreg) { $this->registro_actual = $nroreg; }
    function primero() { $this->registro_actual = 0; }
    function ultimo() { $this->registro_actual = $this->ultimo_registro; }
    function hay_resultados() { return $this->ultimo_registro != -1; }
}
?>

