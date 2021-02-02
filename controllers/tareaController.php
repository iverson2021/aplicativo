<?php

require_once 'models/tarea.php'; //acceder a los metodos crear listar etc


class tareaController {

    public function index() {


//        Utils::isAdmin();
        $tarea = new Tarea(); //llamar al metodo  que me devuelva el resultado
        $tareas = $tarea->getAll(); //carga todas y la devuelvo a la vista
//        // tengo la categorias disponibles en esta vista

        require_once 'views/tarea/index.php';
    }

    public function ver() {
        if (isset($_GET['id'])) {
//            var_dump($_GET['id']);
//            die();
            $id = ($_GET['id']);
            //conseguir la tareas
            $tarea = new Tarea();
            $tarea->setId($id); //setear el id que llega por la web y saber que registro saco
            $tarea = $tarea->getOne(); //sacamos la categoria
//             var_dump($tarea);
//             die();
            //consegir productos
            $producto = new Producto();
            $producto->setTarea_id($id); //setear el id que llega por la web y saber que registro saco
            $productos = $producto->getAllTarea();
        }
        require_once 'views/tarea/ver.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/tarea/crear.php';
    }

//
    public function save() {
        Utils::isAdmin();
//si llegan datos por post
//        var_dump($_POST);
//        die();
        if (isset($_POST) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['fechaInicio']) && isset($_POST['fechaFinal']) && isset($_POST['registradaPor'])) {
//guardar la categoria en la base de datos

            $tarea = new Tarea();
            $tarea->setNombre($_POST['nombre']);
            $tarea->setDescripcion($_POST['descripcion']);
            $tarea->setFechaInicio($_POST['fechaInicio']);
            $tarea->setFechaFinal($_POST['fechaFinal']);
            $tarea->setRegistradaPor($_POST['registradaPor']);
        

            $tarea->save();
        }
        header("Location:" . base_url . "tarea/index");
    }

    public function estado() {
        Utils::isAdmin();
        if (isset($_POST['tarea_id']) && isset($_POST['estado'])) {
            // Recoger datos form
            $id = $_POST['tarea_id'];
            
            var_dump($id);
            die();
            $estado = $_POST['estado'];

            // Upadate del pedido
            $tarea = new Tarea();
            $tarea->setId($id);
            $tarea->setEstado($estado);
            $tarea->edit();

            header("Location:" . base_url . 'tarea/verx&id=' . $id);
        } else {
            header("Location:" . base_url);
        }
    }

}
