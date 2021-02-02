<?php

class Tarea {

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $fechaInicio;
    private $fechaFinal;
    private $registradaPor;
    private $fechaRegistro;
    private $estado;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }
    function getCategoria_id() {
        return $this->categoria_id;
    }

        function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function getFechaFinal() {
        return $this->fechaFinal;
    }

    function getRegistradaPor() {
        return $this->registradaPor;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }
    function getEstado() {
        return $this->estado;
    }

    
        function setId($id) {
        $this->id = $id;
    }
    function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

        function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    function setFechaFinal($fechaFinal) {
        $this->fechaFinal = $fechaFinal;
    }

    function setRegistradaPor($registradaPor) {
        $this->registradaPor = $this->db->real_escape_string($registradaPor);
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getAll($limit) {
        $tareas = $this->db->query("SELECT * FROM tareas ORDER BY id DESC");
        return $tareas;
    }

//para utilizar ese metodo en mi controlador
    public function getOne() {
        $tarea = $this->db->query("SELECT * FROM tareas WHERE id={$this->getId()}");
        return $tarea->fetch_object();
    }

    public function save() {

        $sql = "INSERT INTO tareas VALUES(NULL,{$this->getNombre()}',{$this->getCategoria_id()},'{$this->getDescripcion()}','{$this->getFechaInicio()}', '{$this->getFechaFinal()}','{$this->getRegistradaPor()}', curdate(), 'confirm');";
        $save = $this->db->query($sql);
//        var_dump($save);
//        die();
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

	public function edit(){
		$sql = "UPDATE tareas SET estado='{$this->getEstado()}' ";
		$sql .= " WHERE id={$this->getId()};";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
}
