<?php

require_once 'models/producto.php';

class productoController {

    public function index() {

        $producto = new Producto();
        $productos = $producto->getRandom(6);
        // var_dump($productos->fetch_object());
        //var_dump($productos->num_rows);
//renderizar viasta
        require_once 'views/producto/destacados.php';
    }

    public function ver() {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new Producto(); //creo objeto
            $producto->setId($id); //modifico

            $product = $producto->getOne();
        }
        require_once 'views/producto/ver.php'; //incluir vista para reusarla
    }

    public function gestion() {
        Utils::isAdmin(); //si es un administrador

        $producto = new Producto(); //creo el producto para aceder <?= base_url  y hacer el select
        $productos = $producto->getAll(); //me devuelve el resulset que se guearda en la variable $productos

        require_once 'views/producto/gestion.php';
    }

    public function crear() {
        Utils::isAdmin(); //si es un administrador

        $producto = new Producto(); //creo el producto para aceder <?= base_url  y hacer el select
        $productos = $producto->getAll(); //me devuelve el resulset que se guearda en la variable $productos
//y despus le llega a mi vista 
        require_once 'views/producto/crear.php';
    }

    public function save() {
        Utils::isAdmin(); //si es un administrador
        if (isset($_POST)) {
//            var_dump($_POST);
//            die();
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $color = isset($_POST['color']) ? $_POST['color'] : false;
            $peso = isset($_POST['peso']) ? $_POST['peso'] : false;
            $marca = isset($_POST['marca']) ? $_POST['marca'] : false;
            $valorCompra = isset($_POST['valorCompra']) ? $_POST['valorCompra'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
           
            //  $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;


           
//seteamos los datos
            if ($nombre && $color && $peso && $marca && $valorCompra && $stock) {
                $producto = new Producto;
                $producto->setNombre($nombre);
                $producto->setColor($color);
                $producto->setPeso($peso);
                $producto->setMarca($marca);
                $producto->setValorCompra($valorCompra);
                $producto->setStock($stock);
               

 $imagen = isset($_POST['$imagen']) ? $_POST['$imagen'] : false;
// Guardar la imagen
                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
            
                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);

                    $save = $producto->edit();
                } else {
                    $save = $producto->save();
                }

                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        header('Location:' . base_url . 'producto/gestion');
    }

    public function editar() {
        Utils::isAdmin();
//        var_dump($_GET);
//        die();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        } else {
            header('Location:' . base_url . 'producto/gestion');
        }
    }


    public function eliminar() {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);

            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header('Location:' . base_url . 'producto/gestion');
    }

}
