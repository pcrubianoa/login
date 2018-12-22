<?php
require_once 'Crud.php';

class Usuario extends Crud {
    protected $table = 'usuarios';
    private $nombre="";     public function setNombre($nombre) { $this->nombre = $nombre;}
    private $usuario="";    public function setUsuario($usuario) { $this->usuario = $usuario;}
    private $clave="";      public function setClave($clave) { $this->clave = md5($clave);}     
    private $id_grupo="";    public function setId_grupo($id_grupo) { $this->id_grupo = $id_grupo;}   
    
    public function __construct() {    
        self::order("A.nombre");
    }

    public function insert() {
        $sql  = "INSERT INTO ".$this->table." (nombre,usuario,clave,id_grupo) VALUES (";
        $sql .= "'".$this->nombre."',";
        $sql .= "'".$this->usuario."',";
        $sql .= "'".$this->clave."',";
        $sql .= "'".$this->id_grupo."'";
        $sql .= ")";
        try {
            $stmt = DB::execute($sql);
        } catch (Exception $e) {
            echo "Error 201. Error insertando registro" . $e;
        }
    }

    public function update($id) {
        $sql  = "UPDATE ".$this->table." SET "; 
        $sql .= " `nombre` = '".$this->nombre."',";
        $sql .= " `usuario` = '".$this->usuario."',";
        $sql .= " `id_grupo` = '".$this->id_grupo."'";
        $sql .= " WHERE id = ".$id." LIMIT 1";
        try {
            $stmt = DB::execute($sql);
        } catch (Exception $e) {
            echo "Error 201. Error actualizando registro" . $e;
        }
    }

    public function actualizarClave($id,$field,$value) {
        $value = md5($value);
        $sql = "UPDATE ".$this->table." SET `".$field."` = '".$value."' WHERE id = ".$id." LIMIT 1";
        $stmt = DB::execute($sql);
    }
}
?>