<?php // TEST Este Articulo.php A MODO DE  Test, para el Framework de trabajo se borra

class Articulo{
    private $db;

    public function __construct(){
        $this->db = new BASE;              //estamos instanciado la clase Base, eso esta controlado por el controlador principal
    }

    public function obtenerArticulos(){
        $this->db->query("SELECT * FROM articulos");
        return $this->db->registros();                      //registros() viene de Base
    }
}


?>