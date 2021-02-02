<?php

class Venta {

    private $id;
    private $usuario_id;
    private $codigo;
    private $valor;
    private $fecha;
    private $hora;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getValor() {
        return $this->valor;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    public function getAll() {
        $productos = $this->db->query("SELECT * FROM ventas ORDER BY id DESC");
        return $productos;
    }

    public function getOne() {
        $producto = $this->db->query("SELECT * FROM ventas WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }
    public function getOnebyUser() {
       $sql = "SELECT v.id, v.valor FROM ventas v "
				//. "INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
				. "WHERE v.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
			
		$venta = $this->db->query($sql);
//		echo $sql;
//                echo $this->db->error;
//                die();
		return $venta->fetch_object();

    }

    public function save() {
        $sql = "INSERT INTO ventas VALUES(NULL,'{$this->getUsuario_id()}',{$this->getCodigo()}, {$this->getValor()}, CURDATE(), CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }


    public function edit() {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
        $sql .= " WHERE id={$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
}
