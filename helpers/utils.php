<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function isIdentity() {
        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showCategorias() {
        require_once 'models/categoria.php';
        $categoria = new Categoria(); //metodo index del controlador
        $categoria = $categoria->getAll();
        return $categoria;
    }

    public static function showStatus($status) {
        $value = 'Pendiente';

        if ($status == 'confirm') {
            $value = 'Pendiente';
        } elseif ($status == 'preparation') {
            $value = 'En preparación';
        } elseif ($status == 'ready') {
            $value = 'Preparado para enviar';
        } elseif ($status = 'sended') {
            $value = 'Enviado';
        }

        return $value;
    }

    public static function statsValor() {
       $stats = array(
            'count' => 0,
            'total' => 0
        );

        if (isset($_SESSION['venta'])) {
            $stats['count'] = count($_SESSION['venta']);

            foreach ($_SESSION['venta'] as $producto) {
                $stats['total'] += $producto['valorCompra'] * $producto['unidades'];
            }
        }

        return $stats;
    }

}
