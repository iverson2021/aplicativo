<?php

class Producto {

    private $id;
    private $nombre;
    private $color;
    private $peso;
    private $marca;
    private $valorCompra;
    private $stock;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getColor() {
        return $this->color;
    }

    function getPeso() {
        return $this->peso;
    }

    function getMarca() {
        return $this->marca;
    }

    function getValorCompra() {
        return $this->valorCompra;
    }

    function getStock() {
        return $this->stock;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setColor($color) {
        $this->color = $this->db->real_escape_string($color);
    }

    function setPeso($peso) {
        $this->peso = $this->db->real_escape_string($peso);
    }

    function setMarca($marca) {
        $this->marca = $this->db->real_escape_string($marca);
    }

    function setValorCompra($valorCompra) {
        $this->valorCompra = $this->db->real_escape_string($valorCompra);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

        // tengo todos los productos de la basa de datos
    public function getAll() {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }

    public function getRandom($limit) {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function getOne() {
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

    public function save() {
        $sql = "INSERT INTO productos VALUES(NULL,'{$this->getNombre()}', '{$this->getColor()}', {$this->getPeso()},'{$this->getMarca()}', {$this->getValorCompra()},{$this->getStock()}, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);
//        echo $sql;
//        echo '<br>';
//        echo $this->db->error; //depurar codigo
//        die();
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit() {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', color='{$this->getColor()}',peso={$this->getPeso()},marca='{$this->getMarca()}',valorCompra={$this->getValorCompra()},stock={$this->getStock()},imagen='{$this->getImagen()}'";

        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }

        $sql .= " WHERE id={$this->id};";


        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete() {
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

}
