<?php

require_once 'models/venta.php';

class ventaController {

    public function hacer() {
        require_once 'views/venta/hacer.php';
    }

    public function add() {
//        var_dump($_POST);
//        die();
        if (isset($_SESSION['identity'])) {
//guardar datos
            $usuario_id = $_SESSION['identity']->id;
//                   var_dump($usuario_id);
//                   die();

            $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;
            $valor = isset($_POST['valor']) ? $_POST['valor'] : false;


//             $stats = Utils::statsValor();
//            $valor =  $stats['total'];
//            

            if ($codigo && $valor) {
                $venta = new Venta();
                $venta->setUsuario_id($usuario_id);
                $venta->setCodigo($codigo);
                $venta->setValor($valor);



                $save = $venta->save();
//                var_dump($save);
//                die();
                //guardar lineas pedido

                if ($save) {
                    $_SESSION['venta'] = "complete";
                } else {
                    $_SESSION['venta'] = "failed";
                }
            } else {
                $_SESSION['venta'] = "failed";
            }

//			header("Location:".base_url.'venta/confirmado');			
//		}else{
            // Redigir al index
            header("Location:" . base_url);
        }
    }

    public function confirmado() {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $venta = new Venta();
            $venta->setUsuario_id($identity->id);

            $venta = $venta->getOneByUser();
//
//            $venta_productos = new Venta();
         //   $productos = $venta_productos->getProductosByventa($venta->id);
        }
        require_once 'views/venta/confirmado.php';
    }

//public function mis_pedidos(){
//		Utils::isIdentity();
//		$usuario_id = $_SESSION['identity']->id;
//		$pedido = new Pedido();
//		
//		// Sacar los pedidos del usuario
//		$pedido->setUsuario_id($usuario_id);
//		$pedidos = $pedido->getAllByUser();
//		
////		require_once 'views/pedido/mis_pedidos.php';
//	}
//	public function detalle(){
//		Utils::isIdentity();
//		
//		if(isset($_GET['id'])){
//			$id = $_GET['id'];
//			
//			// Sacar el pedido
//			$pedido = new Pedido();
//			$pedido->setId($id);
//			$pedido = $pedido->getOne();
//			
//			// Sacar los poductos
//			$pedido_productos = new Pedido();
//			$productos = $pedido_productos->getProductosByPedido($id);
//			
//			require_once 'views/pedido/detalle.php';
//		}else{
//			header('Location:'.base_url.'pedido/mis_pedidos');
//		}
//	}
////	
//	public function gestion(){//sacar todos los pedidos
//		Utils::isAdmin();
//		$gestion = true;
//		
//		$pedido = new Pedido();
//		$pedidos = $pedido->getAll();
//		
//		require_once 'views/pedido/mis_pedidos.php';
//	}
//	
//	public function estado(){
//		Utils::isAdmin();
//		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
//			// Recoger datos form
//			$id = $_POST['pedido_id'];
//			$estado = $_POST['estado'];
//			
//			// Upadate del pedido
//			$pedido = new Pedido();
//			$pedido->setId($id);
//			$pedido->setEstado($estado);
//			$pedido->edit();
//			
//			header("Location:".base_url.'pedido/detalle&id='.$id);
//		}else{
//			header("Location:".base_url);
//		}
//	}
//	
//	
}
